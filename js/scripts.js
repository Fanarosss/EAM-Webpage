$(document).ready(function() {
  $('.view_data').click(function(){
     var book_id = $(this).attr("id");
     $.ajax({
          url:"show_header.php",
          method:"post",
          data:{book_id:book_id},
          success:function(data){
               $('#book_header').html(data);
               $('#dataModal').modal("show");
          }
     });
     $.ajax({
          url:"show_details.php",
          method:"post",
          data:{book_id:book_id},
          success:function(data){
               $('#book_details').html(data);
               $('#dataModal').modal("show");
          }
     });
   });
});
