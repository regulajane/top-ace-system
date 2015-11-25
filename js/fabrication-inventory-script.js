window.onload = function () { fabOrder(); }
function fabOrder(){
    document.getElementById("test1").style.visibility = 'hidden';
    // job order table
    $("#fabricationTable").bootgrid({
        ajax: true,
        url: "data-servers/fabrication-inventory-server.php",
        selection: true,
        rowSelect: true,
        labels: {
            infos: "Showing {{ctx.start}} to {{ctx.end}} of {{ctx.total}} Items"
        },
    });
     $("#editfab").on("click", function() {
            var selectedItemArray = $("#fabricationTable").bootgrid("getSelectedRows");
            var selectedItem = parseInt(selectedItemArray) + 0;
         if(! selectedItem){
                alert("Please select an item.");
                location.reload();
            } else
            $.ajax({
                type: "POST",
                url: "includes/data-processors/processFabricationajax.php",
                data: {selectedItem: selectedItem},
                success: function(data) {
                    
                    fabData = JSON.parse(data);


                    var itemid = fabData.itemid;
                    var itemname    = fabData.itemname;
                    var itemsizediam = fabData.itemsizediam;
                    var itemsizelength = fabData.itemsizelength;

                  
                    // Update 
                    $(".editFabClass  #itemid").val(itemid); 
                    $(".editFabClass  #itemname").val(itemname); 
                    $(".editFabClass  #itemsizediam").val(itemsizediam); 
                    $(".editFabClass  #itemsizelength").val(itemsizelength);

                 
                }
            });           
        });
$('.newFab #itemname').typeahead({
        name: 'itemname',
        remote:'includes/data-processors/searchfabname.php?key=%QUERY',
        limit : 10
    });

}
function navbar(){
    var activeEl = 3;
    var items = $('.navbar .btn-nav');
    $( items[activeEl] ).addClass('active');
    
   
}