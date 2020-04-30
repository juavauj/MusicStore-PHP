
document.addEventListener('DOMContentLoaded',()=>{
    const xhr = new XMLHttpRequest();
//loadDropdown('');



let loadDropdown = (generoConsulta) =>{
    let genero={
        accion:'consultarGenero',
        genero:generoConsulta

    };
    let generoString=JSON.stringify(genero);
    xhr.open('POST','../../control/generosControl.php');
    xhr.setRequestHeader("Content-Type","application/json");
    xhr.onreadystatechange= function(){
        if (this.status==200 && this.readyState==4) {
           // let res=JSON.parse(this.responseText);            
            //console.log(res[0]);
            
                //render(res);
           
        };
    };

    xhr.send(generoString);
}
loadDropdown('');
});
