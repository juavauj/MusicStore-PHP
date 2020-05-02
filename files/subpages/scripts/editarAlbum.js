

document.addEventListener('DOMContentLoaded',()=>{
const xhr = new XMLHttpRequest();  

try {
    procesoCarga(1);
} catch (error) {
    console.log(error);
}





function procesoCarga(processState){
    switch (processState) {
        case 1:
            loadGenerosDropdown('');
            break;
        case 2:
            loadEstadoRadioBtn();
        break;
    
        default:
            break;
    }
}

function loadGenerosDropdown (generoConsulta){
    let genero={
        accion:'consultarGenerosAJAX',
        genero:generoConsulta

    };
    let generoString=JSON.stringify(genero);
    xhr.open('POST','../../control/generosControl.php');
    xhr.setRequestHeader("Content-Type","application/json");
    xhr.onreadystatechange= function(){
        if (this.status==200 && this.readyState==4) {
            let res=JSON.parse(this.responseText); 
            console.log('respuesta',res);           
            
            renderDrobDown(res,'generoSelect',2);
            try {
                procesoCarga(2);           
            } catch (error) {
                console.log(error);
            }
            
        };
    };

    xhr.send(generoString);
}
    function renderDrobDown(params,id,modo){
        /* 
            modo 1-> carga el dropdown sin dejar fijo un valor en el select
            modo 2-> carga el dropdown dejando un valor fijo en el select, para la edicion de albumes
        */
         let option='';   
        let generoAlbum='';
        const selectGenero=document.getElementById(`${id}`);
        if(modo===2){
            generoAlbum=selectGenero.value;
        }
        selectGenero.innerHTML='';
        if(params[0].idGenero!=null){
            params.forEach(param => {
                if(modo===2 && param.idGenero===generoAlbum){
                    option=`<option value="${param.idGenero}" selected>${param.genero}</option>`;
                }else{
                    option=`<option value="${param.idGenero}">${param.genero}</option>`;
                }
               
                selectGenero.innerHTML+=option;

            });
        }
    }

    function loadEstadoRadioBtn(){

        let estado={
            accion:'consultarEstadosAJAX',
    
        };
        let estadoString=JSON.stringify(estado);
        xhr.open('POST','../../control/estadosControl.php');
        xhr.setRequestHeader("Content-Type","application/json");
        xhr.onreadystatechange= function(){
            if (this.status==200 && this.readyState===4) {
                let res=JSON.parse(this.responseText);            
                
                renderRodioBtns(res,'rad-btn-contenedor')
               
            };
        };
    
        xhr.send(estadoString);

    };

    function renderRodioBtns(params,selector){

        let option='';  
        const divRadioBtns=document.querySelector(`.${selector}`);
        const estadoAlbum=document.getElementById('estadoHidden').value;
        console.log(estadoAlbum);

        divRadioBtns.innerHTML='';
        
        if(params[0].idEstado!=null){
            params.forEach(param => {
                if(param.idEstado===estadoAlbum){
                    option=`<input type="radio" name="estado" value=${param.idEstado} checked> ${param.estado} `;
                }else{

                    option=`<input type="radio" name="estado" value=${param.idEstado}> ${param.estado} `;
                }

                divRadioBtns.innerHTML+=option;
            });

        }

    }












});
