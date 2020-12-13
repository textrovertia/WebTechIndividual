

//Updating Staff
$(".table").on('click-cell.bs.table', function(e,field, value, row,){​​​​​​​​
console.log(field,value,row);
//delete
if(field=='delete'){​​​​​​​​
vardeleteMsg=setTimeout(function () {​​​​​​​​
swal({​​​​​​​​
title:"Deleting a Staff",
text:"Do you really want to Staff?",
icon:"warning",
buttons:true,
dangerMode:true,
                }​​​​​​​​).then((willDelete) => {​​​​​​​​
if (willDelete) {​​​​​​​​
swal("Staff has been deleted!", {​​​​​​​​
icon:"success",

                      }​​​​​​​​);
varrequest= $.ajax({​​​​​​​​
url:'update-staff.php',
data: {​​​​​​​​staff_id:row.staff_id ,delete:row.delete}​​​​​​​​,

encode:true,
type:"POST",
success:function (response,data) {​​​​​​​​
console.log(data);
if(!response.success) returnresponse.msg;
elseconsole.log(data);
                        }​​​​​​​​

                        }​​​​​​​​);
request.done(function(msg) {​​​​​​​​
console.log( msg );
                        }​​​​​​​​);

request.fail(function(jqXHR, textStatus) {​​​​​​​​
console.log( "Request failed: "+textStatus );
                        }​​​​​​​​);
                    }​​​​​​​​ else {​​​​​​​​
swal("Staff wasn't deleted!",{​​​​​​​​
icon:"error",
                      }​​​​​​​​);

                    }​​​​​​​​
                  }​​​​​​​​);
            }​​​​​​​​, 0);
        }​​​​​​​​
//update
setTimeout(function () {​​​​​​​​        
varrequest= $.ajax({​​​​​​​​
url:'update-staff.php',
data: {​​​​​​​​staff_id:row.staff_id ,kayacare_id:row.kayacare_id, fname:row.fname, mname:row.mname, lname:row.lname,email:row.email, phone:row.phone, address:row.address, dob:row.dob, sex:row.sex}​​​​​​​​,

encode:true,
type:"POST",
success:function (response,data) {​​​​​​​​
console.log(data);
if(!response.success) returnresponse.msg;
elseconsole.log(data);
                }​​​​​​​​


​[02:00] Kweku Yamoah
    
 }​​​​​​​​​);
            request.done(function(msg) {​​​​​​​​​
                console.log( msg );
            }​​​​​​​​​);

            request.fail(function(jqXHR, textStatus) {​​​​​​​​​
                console.log( "Request failed: " + textStatus );
            }​​​​​​​​​);
        }​​​​​​​​​, 30000); //Delay ajax request for 30 seconds
    }​​​​​​​​​);

