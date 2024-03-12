
let tour;
function startTour() {
    localStorage.removeItem("tour_end");
    localStorage.removeItem("tour_current_step");
    tour.init();
    tour.start();
    createTour();

}

function createTour() {
    var template = "<div class='t_popover tour' style='max-width: 320px;opacity:1'>";
    template += "<div class='arrow'></div>";
    template += "<h3 class='t_popover-title'></h3>";
    template += "<div class='t_popover-content'></div>";
    template += "<div class='t_popover-navigation'>";
    template += "<button class='btn btn-default' data-role='prev'>" + jsLang.previous + "</button>";
    template += "<span data-role='separator'>|</span>";
    template += "<button class='btn btn-default' data-role='next'>" + jsLang.next + "</button>";
    template += "<button class='btn btn-default' data-role='end'>" + jsLang.endTour + "</button>";
    template += "</div>";

    template += "</div>";

    // Instance the tour
    tour = new Tour({
        debug: true,
        backdrop: false,
        template: template,

        steps: [
            {
                element: "#m-dashboard",
                title: "title here",
                content: "content here",
                // path: "http://localhost/justcar/dashboard"
            },
            {
                element: "#m-db-dashboard",
                title: "title here",
                content: "content here",
            },
            {
                element: "#m-db-customer",
                title: "title here",
                content: "content here",
            },
            {
                element: "#m-vehicles",
                title: "title here",
                content: "content here",
            },
            {
                element: "#m-vh-product",
                title: "title here",
                content: "content here",
            },
            {
                element: "#m-vh-product-tax",
                title: "title here",
                content: "content here",
            },
           
        ]

    });

}

