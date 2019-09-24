
$(document).ready(function(){
    $("#barcodeIdForJs").on("input", function() {
        if(!quickScanEnabled()){
            return;
        }
        if (this.value){// TODO if length more than x amount
            if (this.value.length >= 9){
                barcodeInput = this.value;
                console.log(this.value);
                $.post("./quick-scan-service.php", { barcode: barcodeInput})
                .done(function(data) {
                    if (data.includes('Update successful')){
                        appendToLog($("#barcodeIdForJs").val());
                        clearBarcodeField();
                    }else{
                        alert(data);
                    }
                    console.log('data>'+data);
                    console.log('done posting to server');
                })
                .fail(function(xhr, status, error){
                    alert(status + "error\n" + error);
                    console.log(status + "error\nError message>" + error);
                });
            }else{
                alert("Invalid barcode");
            }
        }
    });

    $("#resetButton").on("click", function(){
        $.post("./reset-button.php")
        .done(function(data) {
            
        })
        .fail(function(xhr, status, error){
            
        });
    });

    $("#checkoutButton").on("click", function(){
        checkoutBatchId();
    });
    
    $("#log").append(getLogFromLocalStorage());

    function appendToLog(content){
        $('#log').append(content + '<br/>');
        saveLogToLocalStorage(getLogFromLocalStorage() + content + '<br/>');
    }
    
    function getLogFromLocalStorage(){
        var log = localStorage.getItem('log');
        if(log === null){
            log = "";
        }
        return log;
    }

    function quickScanEnabled(){
        var input = $("#quickScanCheckbox");
        if (input != null){
            var checkbox = input[0];
            if (checkbox != null){
                if (checkbox.checked){
                    return true;
                }
            }
        }
        return false;
    }

    function saveLogToLocalStorage(content){
        localStorage.setItem('log', content);
    }

    function clearLog(){
        $('#log').empty();
        saveLogToLocalStorage('');
    }
    
    function clearBarcodeField(){
        $("#barcodeIdForJs").val("");
    }
    
    function updateBatchId(content){
        $("#batchIdForJs").val(content);
    }

    function checkoutBatchId(){
        checkout = true;
        $.post("./quick-scan-service.php", { checkout: checkout})
        .done(function(data) {
            updateBatchId(data);
            clearBarcodeField();
            clearLog();
            console.log('done checkoutBatchId');
        })
        .fail(function(xhr, status, error){
            alert(status + "error\n" + error + "\nPlease stop the scanning");
            console.log(status + "error\nError message>" + error);
        });
    }

});
