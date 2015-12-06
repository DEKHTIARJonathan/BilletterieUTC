$( document ).ready(function() {
  $("#assoSelect").on('change', function() {
    window.location = "http://"+window.location.hostname + window.location.pathname + "?asso=" + this.value ;
  });

  var current_href = $(location).attr('href');

  if (current_href.indexOf("createAsso") !== -1)
  {
      $("#createAsso").addClass("active");
      $("#adminBilletterie").addClass("opened");
      $("#adminBilletterieUL").addClass("visible");
  }
  else if (current_href.indexOf("platformRights") !== -1) {
    $("#platformRights").addClass("active");
    $("#adminBilletterie").addClass("opened");
    $("#adminBilletterieUL").addClass("visible");
  }
  else if (current_href.indexOf("myAsso") !== -1) {
    $("#myAsso").addClass("active");
    $("#adminAsso").addClass("opened");
    $("#adminAssoUL").addClass("visible");
  }
  else if (current_href.indexOf("assoMembers") !== -1) {
    $("#assoMembers").addClass("active");
    $("#adminAsso").addClass("opened");
    $("#adminAssoUL").addClass("visible");
  }
  else if (current_href.indexOf("createEvent") !== -1)
    $("#createEvent").addClass("active");

  else if (current_href.indexOf("myEvents") !== -1)
    $("#myEvents").addClass("active");
    
  else
    $("#home").addClass("active");

});
