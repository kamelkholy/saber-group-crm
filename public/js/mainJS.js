function addproductcolor(){
  var color = 

  		"<div class=\"form-group\">"
               +"<label>Product Color</label>"
               +"<div>"
               +"<input name=\"var12[]\" type=\"text\" class=\"form-control\" required placeholder=\"Product Color\"/>"
               +"</div>"
               +"</div>"

  document.getElementById('color').innerHTML += color;
}

function addproductsize(){
  var size = 

  		"<div class=\"form-group\">"
               +"<label>Product Size</label>"
               +"<div>"
               +"<input name=\"var13[]\" type=\"text\" class=\"form-control\" required placeholder=\"Product Size\"/>"
               +"</div>"
               +"</div>"

  document.getElementById('size').innerHTML += size;
}

function addimage(){
  var image = 

  			"<div class=\"form-group\">"
               +"<label>Product Image</label>"
               +"<div>"
              +"<input style=\"width: 100%;background-color: #660099;border-color: #660099\" class=\"btn btn-danger\" type=\"file\" required=\"requird\" class=\"form-control\" name=\"var14[]\" >"
               +"</div>"
               +"</div>"

  document.getElementById('image').innerHTML += image;
}

function add_lesson_c(){
  var lesson = 

        "<div class=\"form-group\">"
               +"<label>New Image</label>"
               +"<div>"
              +"<input style=\"width: 100%;background-color: #660099;border-color: #660099\" class=\"btn btn-danger\" type=\"file\"  class=\"form-control\" name=\"var14[]\" >"
               +"</div>"
               +"</div>"

  document.getElementById('lesson').innerHTML += lesson;
}

function addspec(){								

var spec = 

									                         "<div class=\"row\">"                                       
										                            +"<div class=\"col-md-3\">"                                                        
                                                +"<div  class=\"form-group\">"
                                                +"<label>English Specifcation</label>"
                                                +"<div>"
                                                +"<input style=\"width: 100%\"  name=\"var15[1][engspec][]\" type=\"text\" class=\"form-control\" required placeholder=\"English Specifcation\"/>"
                                                +"</div>"

                                                +"</div>"
                                            +"</div>"

                                        +"<div class=\"col-md-3\">"
                                            +"<div  class=\"form-group\">"
                                            +"<label> English Specifcation  Value</label>"
                                            +"<div>"
                                            +"<input style=\"width: 100%\" name=\"var15[1][engspecval][]\"type=\"text\" class=\"form-control\" required placeholder=\"English Specifcation Value\"/>"
                                            +"</div>"

                                            +"</div>"
                                        +"</div>"

                                        +"<div class=\"col-md-3\">"
                                                        
                                                +"<div  class=\"form-group\">"
                                                +"<label>Arabic Specifcation</label>"
                                                +"<div>"
                                                +"<input style=\"width: 100%\"  name=\"var15[1][araspec][]\" type=\"text\" class=\"form-control\" required placeholder=\"Arabic Specifcation\"/>"
                                                +"</div>"

                                                +"</div>"
                                            +"</div>"

                                        +"<div class=\"col-md-3\">"
                                            +"<div  class=\"form-group\">"
                                            +"<label>English Specifcation Value</label>"
                                            +"<div>"
                                            +"<input style=\"width: 100%\" name=\"var15[1][araspecval][]\" type=\"text\" class=\"form-control\" requi placeholder=\"English Specifcation Value\"/>"
                                            +"</div>"

                                            +"</div>"
                                        +"</div>"
                                                    
                                    +"</div>"
                                                

                                    +"<hr>"

        document.getElementById('spec').innerHTML += spec;
}

function goBack() {
  window.history.back();
}

const stock =  document.querySelectorAll('#showModal');

stock.forEach((btn)=>{
  btn.addEventListener('click' , function(){
    // alert(this.dataset.key);
    const modalForm = document.querySelector('.model-form');
    const url = modalForm.getAttribute('action') + this.dataset.key;
    modalForm.setAttribute('action',url);
  });

});

const delete_val =  document.querySelectorAll('#showModal-delete');

delete_val.forEach((btn)=>{
  btn.addEventListener('click' , function(){
    //alert(this.dataset.key);
    const del = document.querySelector('.model-form-del');
    // console.log(del);
    const url = del.getAttribute('href') + this.dataset.key;
    del.setAttribute('href',url);
  });
});


function addday(){
  var day = 

                "<div class=\"form-group\">"
                +"<label>Day*</label>"
                +"<div>"

                +"<select name=\"var10[1][day][]\" type=\"text\" class=\"form-control\" required>"
                +"<option value=\"\">Choose One</option>"
                +"<option value=\"Sunday\">Sunday</option>"
                +"<option value=\"Monday\">Monday</option>"
                +"<option value=\"Tuesday\">Tuesday</option>"
                +"<option value=\"Wednesday\">Wednesday</option>"
                +"<option value=\"Thursday\">Thursday</option>"
                +"<option value=\"Friday\">Friday</option>"
                +"<option value=\"Saturday\">Saturday</option>"
                +"</select>"
                +"</div>"
                +"</div>"

               +"<div class=\"form-group\">"
               +"<label>Start Time</label>"
               +"<div>"
               +"<input name=\"var10[1][start][]\" type=\"Time\" class=\"form-control\" required placeholder=\"Product Color\"/>"
               +"</div>"
               +"</div>"

               +"<div class=\"form-group\">"
               +"<label>End Time</label>"
               +"<div>"
               +"<input name=\"var10[1][end][]\" type=\"Time\" class=\"form-control\" required placeholder=\"Product Color\"/>"
               +"</div>"
               +"</div>"
               +"<hr>"

  document.getElementById('time').innerHTML += day;
}

function getmonthlyreport(){

    var month = document.getElementById('month').value;
    var year = document.getElementById('year').value;

    $.ajax({url: "/sabergroupcrm/client/getmonrhlyreport"+"/"+month+"/"+year, success: function(result) {
          $("#report").html(result);
        }});

  }

  function getcat_client() {
    var cat = document.getElementById("var3").value;
    $.get("/crm/moderation/getclientcat/" + cat, function(response) {
        var data = JSON.parse(response);
        var htmlOut = "";
        for (var i = 0; i < data.length; i++) {
            htmlOut +=
                '<option value="' +
                data[i]["client_categories_id"] +
                '">' +
                data[i]["client_categories_name"] +
                "</option>";
        }
        $("#getcat").html(htmlOut);
    });
}

function checknumber_leads() {
    var num = document.getElementById("var2").value;
    $.get("/crm/moderation/checknumber_lead/" + num, function(response) {
        var data = JSON.parse(response);
        var htmlOut = "";

        if(data.length > 0){


        for (var i = 0; i < data.length; i++) {

            htmlOut +=
                '<h6 style=\"color:black\">Lead Information</h6>'+
                '<li>'+'Name : ' + data[i]["customer_name"] + '</li>'+
                '<li>'+'Date : ' + data[i]["customer_date"] + '</li>'+
                '<li>'+'Time : ' + data[i]["customer_time"] + " "+ data[i]["customer_am_pm"] + '</li>'+
                '<li>'+'Mobile : ' + data[i]["customer_phone"] + '</li>'+
                '<li>'+'Client : ' + data[i]["client_name"] + '</li>'+
                '<li>'+'Category : ' + data[i]["client_categories_name"] + '</li>'+
                '<hr>';

              $("#number").html(htmlOut);

          }

        }

          else{

            htmlOut +=
                  '<p style=\"color:#f24734\"><i class=\"fa fa-times\"></i> Lead Not Found</p>';
                  $("#number").html(htmlOut);
          }

          

    });
}

