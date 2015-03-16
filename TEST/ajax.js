$(document).ready(function() {
  $("#submit").click(function() {
   var fnumb = $("#a").val();
   var snumb = $("#b").val();
   $.ajax({
    url: "server.php",
    type: "POST",
    dataType: "text",
    data: ("a="+fnumb+"&b="+snumb),
    success: function(data){
     $("#block").text(data);
    }
    });
   });
});