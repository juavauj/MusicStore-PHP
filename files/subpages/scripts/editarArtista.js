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
                loadEstadoRadioBtn();
                break;
           
        
            default:
                break;
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
            const estadoArtista=document.getElementById('estadoHidden').value;
            console.log(estadoArtista);
    
            divRadioBtns.innerHTML='';
            
            if(params[0].idEstado!=null){
                params.forEach(param => {
                    if(param.idEstado===estadoArtista){
                        option=`<input type="radio" name="estado" value=${param.idEstado} checked> ${param.estado} `;
                    }else{
    
                        option=`<input type="radio" name="estado" value=${param.idEstado}> ${param.estado} `;
                    }
    
                    divRadioBtns.innerHTML+=option;
                });
    
            }
    
        }






})