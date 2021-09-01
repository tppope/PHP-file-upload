let isNameAscending = false;
let isSizeAscending = false;
let isDatumAscending = false;
function showName(input){
    document.getElementById("file-upload-label").textContent = input.files[0].name;
}
function nameSort(){
    let fileNamesElements = $(".file-name");
    let fileNames = [];
    $.each(fileNamesElements,function (){
        fileNames.push(this.textContent);
    })
    fileNames.sort();
    if (isNameAscending)
        fileNames.reverse();
    isNameAscending = !isNameAscending;
    let tableContent = $("#table-content");
    tableContent.empty();
    fileNames.forEach(function (value){
        let rowIndex = findIndexRowByText(value, fileNamesElements);
        $(tableContent).append($(fileNamesElements.get(rowIndex)).parents("tr"));
        fileNamesElements.splice(rowIndex,1);
    })
}
function findIndexRowByText(text, fileNamesElements){
    let trIndex = null;
    $.each(fileNamesElements,function (index){
        if(this.textContent === text) {
            trIndex = index
            return true;
        }
    })
    return trIndex;
}

function sizeSort(){
    let fileSizeElements = $(".file-size");
    let fileSizes = [];
    $.each(fileSizeElements,function (){
        fileSizes.push(parseFloat(this.textContent));
    })
    fileSizes.sort();
    if(isSizeAscending)
        fileSizes.reverse();
    isSizeAscending = !isSizeAscending;
    fileSizeElements.parent().remove();
    let tableContent = $("#table-content");
    fileSizes.forEach(function (value){
        let rowIndex = findIndexRowBySize(value, fileSizeElements);
        $(tableContent).prepend($(fileSizeElements.get(rowIndex)).parent());
        fileSizeElements.splice(rowIndex,1);
    })

}
function findIndexRowBySize(float, fileSizeElements){
    let trIndex = null;
    $.each(fileSizeElements,function (index){
        if(parseFloat(this.textContent) === float) {
            trIndex = index
            return true;
        }
    })
    return trIndex;
}

function datumSort(){
    let fileDatumElements = $(".file-datum");
    let fileDatum = [];
    $.each(fileDatumElements,function (){
        fileDatum.push(this.textContent);
    })
    fileDatum.sort();
    if (isDatumAscending)
        fileDatum.reverse();
    isDatumAscending = !isDatumAscending;
    fileDatumElements.parent().remove();
    let tableContent = $("#table-content");
    fileDatum.forEach(function (value){
        let rowIndex = findIndexRowByDatum(value,fileDatumElements);
        $(tableContent).prepend($(fileDatumElements.get(rowIndex)).parent());
        fileDatumElements.splice(rowIndex,1);
    })
}

function findIndexRowByDatum(datum, fileDatumElements){
    let trIndex = null;
    $.each(fileDatumElements,function (index){
        if(this.textContent === datum) {
            trIndex = index
            return true;
        }
    })
    return trIndex;
}
