<?php
    require_once('top.php');
?>
    <script>
        function getvalue(i){
            $('#ival').html(i);
        }
        $(document).ready(function(){
            $.ajax({
                url:'../controllers_models/Managecarmanufacturer.php',
                data:{'getmanufacturers':true},
                type:'GET',
                success:function(response){
                    //console.log(response);
                    res = JSON.parse(response);
                    //console.log(res);
                    if(res.message == undefined){
                        var rows = "";
                        for(i=0;i<res.length;i++){
                            j = i+1;
                             rows += "<tr><td>"+j+"</td><td>"+res[i].manufacturer+"</td></tr>";
                        }
                        $('#manufacturer_tbody').html(rows);
                    }
                }
            });

            $.ajax({
                url:'../controllers_models/Managecarmodel.php',
                data:{'getcarmodels':true},
                type:'GET',
                success:function(response){
                    //console.log(response);
                    var res = JSON.parse(response);
                    console.log(res);
                    if(res.message == undefined){
                        var rows = "";
                        for(i=0;i<res.length;i++){
                            j=i+1;
                            rows += "<tr data-toggle='modal' data-target='#myModal' onclick='getvalue("+i+")'><td>"+j+"</td><td>"+res[i]['manufacturer']+"</td><td>"+res[i]['model_name']+"</td><td>"+res[i]['total_count']+"</td></tr>"; 
                        }
                        $('#model_tbody').html(rows);
                    }

                }
            });
        });
    </script>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 " style="width:30%;background-color:white;margin:5px;padding:18px;box-shadow:0 0 5px 0 rgba(43,43,43,0.1), 0 11px 6px -7px rgba(43,43,43,0.1);">
                <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Manufacturer</th>
                        </tr>
                    </thead>
                    <tbody id="manufacturer_tbody">

                    </tbody>
                </table>
            </div>
            <div class="col-md-8 " style="background-color:white;margin:5px;padding:18px;box-shadow:0 0 5px 0 rgba(43,43,43,0.1), 0 11px 6px -7px rgba(43,43,43,0.1);">
                <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <th>Sr.No.</th>
                            <th>Manufacturer</th>
                            <th>Model</th>
                            <th>Count</th>
                        </tr>
                    </thead>
                    <tbody id="model_tbody">
                    
                    </tbody>
                </table>
            </div>     
        </div>
        

    </div>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p id="ival">Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>

        </div>
    </div>
    
<?php
    require_once('footer.php');
?>