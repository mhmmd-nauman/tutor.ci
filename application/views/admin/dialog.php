<!doctype html>
<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>assets/calendar_file/reset.css' />
	<link rel='stylesheet' type='text/css' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/start/jquery-ui.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>assets/calendar_file/demo.js' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>assets/calendar_file/demo.css' />
	
	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js'></script>
	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>assets/calendar_file/jquery.weekcalendar.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>assets/calendar_file/demo.js'></script>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Dialog - Modal form</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel='stylesheet' type='text/css' href='<?php echo base_url();?>assets/calendar_file/jquery.weekcalendar.css' />
  <link rel='stylesheet' type='text/css' href='<?php echo base_url();?>assets/calendar_file/libs/css/jquery-ui-1.8.11.custom.css' />
  
  <style>
    body { font-size: 62.5%; }
    label, input { display:block; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 350px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em; }
	  body {
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    margin: 0;
  }

  h1 {
    margin: 0 0 1em;
    padding: 0.5em;
  }

  p.description {
    font-size: 0.8em;
    padding: 1em;
    position: absolute;
    top: 3.2em;
    margin-right: 400px;
  }

  #message {
    font-size: 0.7em;
    position: absolute;
    top: 1em;
    right: 1em;
    width: 350px;
    display: none;
    padding: 1em;
    background: #ffc;
    border: 1px solid #dda;
  }
  
  #event_edit_container
  {
	visibility:hidden;
  }
  </style>
  <script>
  $(function() {
    var dialog, form;
 
   
    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 300,
      width: 350,
      modal: true,
     
    });
 
   
 
    $( "#create-user" ).button().on( "click", function() {
      dialog.dialog( "open" );
    });
  });
  </script>
</head>
<body>
 
  <script type="text/javascript" src="<?php echo base_url();?>assets/calendar_file/libs/date.js"></script>
  <script type='text/javascript' src='<?php echo base_url();?>assets/calendar_file/jquery.weekcalendar.js'></script>
  
  <script type='text/javascript'>
  var year = new Date().getFullYear();
  var month = new Date().getMonth();
  var day = new Date().getDate();

  var eventData = {
    events : [
     // {'id':1, 'start': new Date(year, month, day, 12), 'end': new Date(year, month, day, 13, 35),'title':'Lunch with Mike'},
//      {'id':2, 'start': new Date(year, month, day, 14), 'end': new Date(year, month, day, 14, 45),'title':'Dev Meeting'},
//      {'id':3, 'start': new Date(year, month, day + 1, 18), 'end': new Date(year, month, day + 1, 18, 45),'title':'Hair cut'},
//      {'id':4, 'start': new Date(year, month, day - 1, 8), 'end': new Date(year, month, day - 1, 9, 30),'title':'Team breakfast'},
//      {'id':5, 'start': new Date(year, month, day + 1, 14), 'end': new Date(year, month, day + 1, 15),'title':'Product showcase'}
    ]
  };

  $(document).ready(function() {
    $('#calendar').weekCalendar({
      timeslotsPerHour: 4,
      timeslotHeigh: 30,
      hourLine: true,
      data: eventData,
      height: function($calendar) {
        return $(window).height() - $('h1').outerHeight(true);
      },
      eventRender : function(calEvent, $event) {
        if (calEvent.end.getTime() < new Date().getTime()) {
          $event.css('backgroundColor', '#aaa');
          $event.find('.time').css({'backgroundColor': '#999', 'border':'1px solid #888'});
        }
      },
	  
      eventNew: function(calEvent, $event) {
	  

      $( "#create-user" ).button().on( "click", function() {
      dialog-form.dialog( "open" );
    });         
        //displayMessage('<strong>Added event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
			
		//alert('You\'ve added a new event. You would capture this event, add the logic for creating a new event with your own fields, data and whatever backend persistence you require.');
      },
      eventDrop: function(calEvent, $event) {
        displayMessage('<strong>Moved Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
      },
      eventResize: function(calEvent, $event) {
        displayMessage('<strong>Resized Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
      },
      eventClick: function(calEvent, $event) {
        displayMessage('<strong>Clicked Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
		
      },
      eventMouseover: function(calEvent, $event) {
        displayMessage('<strong>Mouseover Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
      },
      eventMouseout: function(calEvent, $event) {
        displayMessage('<strong>Mouseout Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
      },
      noEvents: function() {
        displayMessage('There are no events for this week');
      }
    });

    function displayMessage(message) {
      $('#message').html(message).fadeIn();
    }

    $('<div id="message" class="ui-corner-all"></div>').prependTo($('body'));
  });

 


</script>
 <div id='calendar'></div>
<div id="dialog-form" title="Create new user">
  <p class="validateTips">All form fields are required.</p>
 
  <form>
    <fieldset>
      <label for="name">Name</label>
      <input type="text" name="name" id="name" value="Jane Smith" class="text ui-widget-content ui-corner-all">
      <label for="email">Email</label>
      <input type="text" name="email" id="email" value="jane@smith.com" class="text ui-widget-content ui-corner-all">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" value="xxxxxxx" class="text ui-widget-content ui-corner-all">
 
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  </form>
</div>
 
 
<button id="create-user">Create new user</button>
 
 
</body>
</html>