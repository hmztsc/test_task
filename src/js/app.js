$("form").submit(function(e){  
   e.preventDefault();

   var url = $(this).attr('action'),
      form = $(this),
      data = $(this).serialize();
   
   if($(this).find(".transaction-overlay").length == 0){
      $(this).append("<div class='transaction-overlay'><i class='fas fa-sync fa-2x fa-spin'></i></div>");
   }
   if($(this).find(".alert").length == 0){
      $(this).append("<div class='alert mt-3'></div>");
   }

   var transactionOverlay = $(this).find(".transaction-overlay"),
      alertBlock = $(this).find(".alert");

   transactionOverlay.parent().css("position","relative");
   
   $.ajax({
      url:url,
      data:data,
      beforeSend: function(){
         transactionOverlay.addClass("active");
      },
      success:function(data){
         transactionOverlay.removeClass("active");

         if(data.status == "success"){
            alertBlock.removeClass("sr-only").addClass("alert-success").html("Transaction was successful.");

            form.find("input").prop("disabled",true);

            setTimeout(function(){
               getTable("btn2");
            },100);
            
            setTimeout(function(){

               var pos = $("#"+form.attr("id")+"_table").offset().top;

               var page = $("html, body");
               page.animate({ scrollTop: pos }, 100, function(){
               });
            },200);
            
            setTimeout(function(){
               $("#"+form.attr("id")+"_table tbody tr:last-child").addClass("table-success");

            },700);
            setTimeout(function(){

               $("#"+form.attr("id")+"_table tbody tr:last-child").removeClass("table-success");
            },1100);



            setTimeout(function(){
               alertBlock.addClass("sr-only").removeClass("alert-success");
               form.find("input[type=text],input[type=date]").val("");
               form.find("input").prop("disabled",false);

            },1500);

         } else {
            alertBlock.removeClass("sr-only").addClass("alert-danger").html("Transaction was unsuccessful. <br><small>"+data.message+"</small>");
         }

      },
      error: function() {
         alertBlock.removeClass("sr-only").addClass("alert-danger").html("Transaction was unsuccessful.");
      }
   });
});


$("button").on("click", function() {
   getTable($(this).attr('id'));
});

function getTable(btn){
   var url = "actions/show.php",
      table = $("#table"+btn.substr(-1)),
      data = {
         btn: btn
      };

   if($("#tableContent").find(".transaction-overlay").length == 0){
      $("#tableContent").prepend("<div class='transaction-overlay'><i class='fas fa-sync fa-2x fa-spin'></i></div>");
   }
   if($("#tableContent").find(".alert").length == 0){
      $("#tableContent").append("<div class='alert mt-3'></div>");
   }

   var transactionOverlay = $("#tableContent").find(".transaction-overlay"),
      alertBlock = $("#tableContent").find(".alert");  
   
   transactionOverlay.parent().css("position","relative");

   $.ajax({
      url:url,
      data:data,
      beforeSend: function(){
         transactionOverlay.addClass("active");
      },
      success:function(data){
         transactionOverlay.removeClass("active");

         $(".tableContentItem").addClass("d-none");
         table.removeClass("d-none");
         
         $.each(data,function(key, value){
            if(!value.length == 0){
               var values = "";
               $.each(value, function(key2, value2) {
                  values += "<tr>";
                  $.each(value2, function(key3, value3) {

                     var tdvalue = value3;
                     if(key3 == "status"){
                        if(tdvalue == 1){
                           tdvalue = "Yes";
                        } else {
                           tdvalue = "No";
                        }
                     }
                     
                     values += "<td>"+tdvalue+"</td>";
                  });
                  values += "</tr>";
               });

               table.find(">* .table:eq("+key+") tbody").html(values);

            } else {
               table.find(">* .table:eq("+key+")").html("No content");
            }
         });

         alertBlock.removeClass("sr-only").addClass("alert-success").html("Tables imported successfully.");
         setTimeout(function(){
            alertBlock.addClass("sr-only").removeClass("alert-success");
         },1500);
      },
      error: function() {
         alertBlock.removeClass("sr-only").addClass("alert-danger").html("Tables imported unsuccessfully.");
      }
   });
}
