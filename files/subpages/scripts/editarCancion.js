document.addEventListener('DOMContentLoaded', function(){
    const xhr = new XMLHttpRequest();  
    let peticion=1;
    let carga =false;
    let urls = [
        '../../control/artistasControl.php',
        '../../control/albumesControl.php'
    ];
    peticionesJAXA();
    
    function peticionesJAXA(){
        switch (peticion) {
            case 1:
                try {
                    if(carga==false){
                        loadGenerosDropdown(urls[0],'artistaSelect','consultarArtistasAJAX');
                        peticion++;
                        
                        carga =true;
                    }
                    
                    
                    
                } catch (error) {
                    console.log(error);
                }
                
                break;
            case 2:
                try {
                    if(carga==false){
                        loadGenerosDropdown(urls[1],'albumSelect','consultarAlbumesAJAX'); 
                        peticion++;                        
                        carga =true;
                    
                    }
                    
                } catch (error) {
                    console.log(error);
                }
                               
            break;
            case 3:
                try {
                    if(carga==false){
                    loadEstadoRadioBtn();
                    //peticion++;                        
                    carga =true;
                    }
                } catch (error) {
                    console.log(error);
                }

            break;
        
            default:
                break;
        }

    }
        
        
function loadGenerosDropdown (url,selector,acc){
    let genero={
        accion:`${acc}`,

    };
    let generoString=JSON.stringify(genero);
    xhr.open('POST',`${url}`);
    xhr.setRequestHeader("Content-Type","application/json");
    xhr.onreadystatechange= function(){
        if (this.status==200 && this.readyState==4) {
            let res=JSON.parse(this.responseText); 
            
            renderDrobDown(res,`${selector}`,2,peticion-1);
            
            if(carga==true){
                carga=false;
                peticionesJAXA()
            }
            
            
        };
    };

    xhr.send(generoString);
}
    function renderDrobDown(params,id,modo,tipo){
        /* 
            modo 1-> carga el dropdown sin dejar fijo un valor en el select
            modo 2-> carga el dropdown dejando un valor fijo en el select, para la edicion de albumes

            tipo 1 -> recibe query de artistaas
            tipo 2 -> recibe query de album
        */
       let option='';  
        switch (tipo) {
            case 1:

                let cancionArtista='';
                const selectCancion=document.getElementById(`${id}`);
                if(modo===2){
                    cancionArtista=selectCancion.value;
                }
                selectCancion.innerHTML=''; 
                if(params[0].idArtista!=null){
                    
                    params.forEach(param => {
                        
                        if(modo===2 && param.idArtista===cancionArtista){
                            option=`<option value="${param.idArtista}" selected>${param.nombre}</option>`;
                        }else{
                            option=`<option value="${param.idArtista}">${param.nombre}</option>`;
                        }
                       
                        selectCancion.innerHTML+=option;
        
                    });
                }
                
                break;
            case 2:
                let cancionAlbum='';
                const selectAlbum=document.getElementById(`${id}`);
                if(modo===2){
                    cancionAlbum=selectAlbum.value;
                }
                selectAlbum.innerHTML=''; 
                if(params[0].idAlbum!=null){
                    
                    params.forEach(param => {
                        if(modo===2 && param.idAlbum===cancionAlbum){
                            
                            option=`<option value="${param.idAlbum}" selected>${param.nombre}</option>`;
                        }else{
                            option=`<option value="${param.idAlbum}">${param.nombre}</option>`;
                        }
                       
                        selectAlbum.innerHTML+=option;
        
                    });
                }
                

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
        const estadoGenero=document.getElementById('estadoHidden').value;
        
        divRadioBtns.innerHTML='';
        
        if(params[0].idEstado!=null){
            params.forEach(param => {
                if(param.idEstado===estadoGenero){
                    option=`<input type="radio" name="estado" value=${param.idEstado} checked> ${param.estado} `;
                }else{

                    option=`<input type="radio" name="estado" value=${param.idEstado}> ${param.estado} `;
                }

                divRadioBtns.innerHTML+=option;
            });

        }

    }

































})