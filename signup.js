/*
Hemanth Sai Challa	
Red_ID:824670867
CS545
Assignment #4
Fall 2019
Instructor:Cyndi Chie
*/

//function to show the total number of attendees
function onAttendeCountChange() {
	var inputCount = event.target.value;
	var count = inputCount.length > 0 ? Number(inputCount) : 0 ;
	var childAttendiesElementIds = ['attendeesone','attendeestwo','attendeesthree','attendeesfour'] ;
	if(!isNaN(count) && count >= 0) {
		totalCount = 0 ;
		for(var i = 0; i < childAttendiesElementIds.length ; i++) {
			var inputCount = document.getElementById(childAttendiesElementIds[i]).value ;
			var childCount = inputCount.length > 0 ? Number(inputCount) : 0 ;
			if(!isNaN(childCount) && childCount >= 0) {
				totalCount = totalCount + childCount ;
			}
		}
		document.getElementById('attendees').value = totalCount ;
	}
}

//function to make sure the First name is in proper case
function titleCasefirstname() {
   var Str = document.getElementById("firstname").value;
   var splitStr = Str.toLowerCase().split(' ');
   for (var i = 0; i < splitStr.length; i++) {
       // You do not need to check if i is larger than splitStr length, as your for does that for you
       // Assign it back to the array
       splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);     
   }
   // Directly return the joined string
   document.getElementById("firstname").value = splitStr.join(' '); 
}

//function to make sure the Last name is in proper case
function titleCaselastname() {
   var Str = document.getElementById("lastname").value;
   var splitStr = Str.toLowerCase().split(' ');
   for (var i = 0; i < splitStr.length; i++) {
       // You do not need to check if i is larger than splitStr length, as your for does that for you
       // Assign it back to the array
       splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);     
   }
   // Directly return the joined string
   document.getElementById("lastname").value = splitStr.join(' '); 
}

//function to display the last modified date and time of the page
function modify() {
  var x = document.lastModified;
  document.getElementById("lastModified").innerHTML = x;	
}
	