/*------------------------------------------------------------------
    Project:        A JavaScript Notification Service
    Version:        1.2.0
    Last change:    10/22/18
    Author:         Klaus Brandner

    [CONFIGURATIONS]
    Configurations can be made in the AcoNotificationService

        + timeVisible: defines how long a notification should be visible
        + maxNotifications: defines how many notifications can be displayed at the same time
        + position: defines where the notifications should be displayed

    -------------------------------------------------------------------*/

/**
###################### HERE YOU CAN MAKE CONFIGURATIONS ######################
*/

var acoNotificationOptions = {
    timeVisible: 3000, // the time for how long notifications should be visible
    maxNotifications: 2, // the maximum number of notifications displayed at the same time
    position: "top-left" // position of the notifications: top-left, top-right, top-center, bottom-left, bottom-right, bottom-center
}

/**
 * ###################### I WOULD NOT RECOMMEND TO CHANGE THE FOLLOWING CODE ######################
 *
 * The AcoNotificationService that takes the options defined above as parameter
 */
var acoNotificationService = new AcoNotificationService(acoNotificationOptions);

function AcoNotificationService(acoNotificationOptions) {

    this.notifications = [];
    this.usedIds = [];
    this.validTypes = ['success', 'info', 'error', 'warning'];
    this.validPositions = ["top-left", "top-right", "top-center", "bottom-left", "bottom-right", "bottom-center"];

    // define how long notifications should be visible
    this.timeVisible = acoNotificationOptions.timeVisible;

    // define how many notifications can be displayed at the same time
    this.maxNotifications = acoNotificationOptions.maxNotifications;

    // define the position of the notifications
    if (this.validPositions.indexOf(acoNotificationOptions.position) === -1) {
        this.position = "bottom-left";
    } else {
        this.position = acoNotificationOptions.position;
    }
}

/**
    The global notify function that can be called from everywhere in your application
    Type: Can be either 'success', 'warning', 'error', or 'info'
    Title: Title of your notification
    Message: Message of your notification
*/
function notify(type, title, message) {
    acoNotificationService.pushNotification(type, title, message);
}

/**
    This method gets called when a new notification should be displayed
*/
AcoNotificationService.prototype.pushNotification = function(type, title, message) {
    var self = this;

    // check if #aco-notification-list element exists - otherwise create it
    if (!document.getElementById("aco-notification-list")) {
        var notificationList = document.createElement("DIV");
        notificationList.setAttribute("id", "aco-notification-list");
        notificationList.setAttribute("class", self.position);
        document.body.appendChild(notificationList);
    }

    // if not a valid type -> type = info
    if (this.validTypes.indexOf(type) === -1) {
        type = 'info';
    }

    // create a unique id for the notification
    var id = 0;
    do {
        id = Math.floor(Math.random() * (10001));
    } while (this.usedIds.indexOf(id) > -1);

    // create the notification object
    var notification = {
        id: id,
        type: type,
        title: title,
        message: message,
        timeout: setTimeout(function() {
            self.deleteNotification(notification.id, true);
        }, this.timeVisible)
    };

    // if too many notifications -> delete the last one
    if (this.notifications.length >= this.maxNotifications) {
        this.deleteNotification(this.notifications[0].id, false);
    }

    // add notification to the notification list
    this.notifications.push(notification);


    // Create the notification DOM element
    var notificationList = document.getElementById('aco-notification-list');
    var notificationElement = document.createElement("DIV");
    notificationElement.className = "aco-notification aco-notification-type-";
    notificationElement.className += notification.type;
    notificationElement.setAttribute("id", "aco-notification-id-" + notification.id);

    /*
        Create the notification content: icon, title, message

        First, add the notification icon
        I used SVG elements for the icons - for each type a separate
    */
    var notificationContent = '<div class="aco-notification-icon">';
    if (notification.type === 'success') {
        notificationContent += '<svg class="aco-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve"><path fill="#FFFFFF" d="M12,0C5.373,0,0,5.373,0,12s5.373,12,12,12s12-5.373,12-12S18.627,0,12,0z M10.75,17.292l-4.5-4.364 l1.857-1.858l2.643,2.506l5.643-5.784l1.857,1.857L10.75,17.292z"/></svg>';
    } else if (notification.type === 'error') {
        notificationContent += '<svg class="aco-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve"><path fill="#FFFFFF" d="M16.971,0H7.029L0,7.029v9.941L7.029,24h9.942L24,16.971V7.029L16.971,0z M15.568,16.945l-3.553-3.521 l-3.518,3.568l-1.418-1.418l3.507-3.566L7,8.536l1.418-1.417l3.581,3.458l3.539-3.583l1.431,1.431l-3.535,3.568L17,15.516 L15.568,16.945z"/></svg>';
    } else if (notification.type === 'warning') {
        notificationContent += '<svg class="aco-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve"><path fill="#FFFFFF" d="M12,1L0,23h24L12,1z M11,9h2v7h-2V9z M12,20.25c-0.69,0-1.25-0.561-1.25-1.25s0.56-1.25,1.25-1.25 c0.689,0,1.25,0.561,1.25,1.25S12.689,20.25,12,20.25z"/></svg>';
    } else {
        notificationContent += '<svg class="aco-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve"><path fill="#ffffff" d="M12 1c-6.338 0-12 4.226-12 10.007 0 2.05.739 4.063 2.047 5.625.055 1.83-1.023 4.456-1.993 6.368 2.602-.47 6.301-1.508 7.978-2.536 9.236 2.247 15.968-3.405 15.968-9.457 0-5.812-5.701-10.007-12-10.007zm1 15h-2v-6h2v6zm-1-7.75c-.69 0-1.25-.56-1.25-1.25s.56-1.25 1.25-1.25 1.25.56 1.25 1.25-.56 1.25-1.25 1.25z"/></svg>';
    }
    notificationContent += '</div>';

    // Add title and message to the notification content
    notificationContent += '<div class="aco-notification-content"><div class="aco-notification-title">';
    notificationContent += notification.title;
    notificationContent += '</div><div class="aco-notification-message">';
    notificationContent += notification.message;
    notificationContent += '</div>';
    notificationContent += '<div class="aco-notification-close-btn" onclick="acoNotificationService.deleteNotification(' + notification.id + ', true)">';
    notificationContent += '<svg class="aco-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve"><path opacity="0.8" fill="#FFFFFF" d="M23.954,21.03l-9.185-9.095l9.092-9.174l-2.832-2.807L11.94,9.133L2.764,0.045l-2.81,2.81 L9.14,11.96l-9.095,9.185l2.81,2.811l9.112-9.191l9.18,9.1L23.954,21.03z"/></svg>';
    notificationContent += '</div>';
    notificationElement.innerHTML = notificationContent;

    // Add the notification element to the notification list element
    if (self.position.indexOf("top") >= 0) {
        notificationList.insertBefore(notificationElement, notificationList.firstChild);
    } else {
        notificationList.appendChild(notificationElement);
    }
}

/**
    This method gets called when a notification should be removed
*/
AcoNotificationService.prototype.deleteNotification = function(id, animated) {
    // loop and find the according notification
    for (var i = 0; i < this.notifications.length; i++) {
        if (this.notifications[i].id === id) {

            // remove the timeout
            clearTimeout(this.notifications[i].timeout);

            // remove notification from the notification list
            this.notifications.splice(i, 1);

            // get the DOM element and add the status-close class for animation
            var elem = document.getElementById("aco-notification-id-" + id);
            elem.className += ' aco-notification-status-close';

            // if animated -> wait and then remove notification from the DOM
            if (animated) {
                setTimeout(function() {
                    elem.parentNode.removeChild(elem);
                }, 350);
            } else {
                elem.parentNode.removeChild(elem);
            }
        }
    }
}