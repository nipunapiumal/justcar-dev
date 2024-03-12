/**
 * CarCopy.com CarApi Helper Scripts
 * 
 * @author CarCopy.com
 * @copyright 2008 Car.Copy.com
 */


function changePictures( miniPicObj , pic )
{
	var picName = pic || 'mpic';
	
	var tmpSrc = new String(miniPicObj.src);
	var newSrc = tmpSrc.replace('tpic',picName);
	var newBigSrc = tmpSrc.replace('tpic','bpic');
	
	document.getElementById('detailpicture').src = newSrc;
	
	document.getElementById('detailpicturelink').href = newBigSrc;
}

function preloadPictures(picarray)
{
  for (i=0; i < picarray.length; i++) {
    var pic = new Image();
    pic.src = picarray[i];
  }
}