(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('.parallax').parallax();


  }); // end of document ready

    $(document).ready(function(){
    $('.materialboxed').materialbox();
  });
  
      $(document).ready(function(){
      $('.slider').slider({full_width: true});
    });
  $(document).ready(function(){
  $('.carousel').carousel();
    });
        
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
        
    
})(jQuery); // end of jQuery name space ok
