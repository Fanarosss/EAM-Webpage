function getDepartments(val){
     $.ajax({
          url:"http://localhost/src/load_options.php",
          method:"post",
          data: {uid:val},
          success:function(data){
               $('#department-list').html(data);
          }
     });
}

function selectUniversity(val) {
  $("#search-box").val(val);
  $("#suggesstion-box").hide();
  }
