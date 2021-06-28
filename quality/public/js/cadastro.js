function send(){
    var form = document.getElementById("formCadastrar");
    var data = document.getElementById("cDataNasc")
    if (new Date(data.value).getYear() > 25)
    form.submit();
    


}
function myFunction(){
    var data =document.getElementById("cDataNasc").value;
    if (new Date(data).getYear() > 25 ) 
    document.getElementById("cDataNasc").value = "";
}

function getIndex(){
    var select = document.getElementById('paginas');
	var value = select.options[select.selectedIndex].value;
    window.location.href = "?page="+value;
    select.options[select.selectedIndex].value = value;
}

function deleDependente(){

}

function excluirCadastro(){
    var form = document.getElementsByName("formExcluir");
    form.submit();

}


function setDependente(){
    var form = document.getElementByTagName("dependenteid");
    form.submit();
    alert('foi')
    
}
function sendD(){
    document.getElementById("formCadastrar").submit();
};

function formExcluir(){
    document.getElementById("formExcluir").submit();
}