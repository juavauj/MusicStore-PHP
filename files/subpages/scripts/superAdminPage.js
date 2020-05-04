document.addEventListener('DOMContentLoaded',()=>{

    const xhr = new XMLHttpRequest();  
    let peticion=1;
    let carga =false;
    let process=false;
    let urls = [
        '../../../control/generosControl.php',
        '../../../control/artistasControl.php',
        '../../../control/albumesControl.php'

        
    ];
    let resultados=[];
    peticionesJAXA();
    if(process===true){
        console.log(resultados);
    }
    //renderDrobDown(resultados[0],'generoSelect',2,1);
    
    function peticionesJAXA(){
        switch (peticion) {
            case 1:
                try {
                    if(carga==false){
                        loadDropDown(urls[0],'consultarGenerosAJAX');
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
                        loadDropDown(urls[1],'consultarArtistasAJAX');
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
                    loadDropDown(urls[2],'consultarAlbumesAJAX');
                    peticion++;                        
                    carga =true;
                    process=true;
                    }
                } catch (error) {
                    console.log(error);
                }

            break;
        
            default:
                break;
        }

    }
        
        
function loadDropDown (url,acc){
    let genero={
        accion:`${acc}`,

    };
    let generoString=JSON.stringify(genero);
    xhr.open('POST',`${url}`);
    xhr.setRequestHeader("Content-Type","application/json");
    xhr.onreadystatechange= function(){
        if (this.status==200 && this.readyState==4) {
            let res=JSON.parse(this.responseText); 

            
            resultados[peticion-2]=res;
            if((peticion-2)===2){
                process=true;
                render();
            }
                
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
            tipo 1 -> recibe query de Genero
            tipo 2 -> recibe query de Artista
            tipo 2 -> recibe query de Album

        */
       let option='';  
        switch (tipo) {
            
            case 1:
                const selectGenero=document.getElementById(`${id}`);
                
                selectGenero.innerHTML=''; 
                if(params[0].idGenero!=null){
                    params.forEach(param => {
                            option+=`<option value="${param.idGenero}">${param.genero}</option>`;
                       
        
                    });
                    selectGenero.innerHTML=option;
                }
                

            break;

            case 2:

                const selectArtista=document.getElementById(`${id}`);                
                selectArtista.innerHTML=''; 
                if(params[0].idArtista!=null){
                    
                    params.forEach(param => {
                        option+=`<option value="${param.idArtista}">${param.nombre}</option>`;
                        
                       
                    });
                    selectArtista.innerHTML=option;
                }
                
            break;
            
            case 3:

                const selectAlbum=document.getElementById(`${id}`);                
                selectAlbum.innerHTML=''; 
                if(params[0].idArtista!=null){
                    
                    params.forEach(param => {
                        option+=`<option value="${param.idAlbum}">${param.nombre}</option>`;
                        
                       
                    });
                    selectAlbum.innerHTML=option;
                }
                
            break;
        
            default:
                break;
        }

          
        
    }
function render(){
    renderDrobDown(resultados[0],'albumGeneroSelect',1,1);
    renderDrobDown(resultados[1],'albumArtistaSelect',1,2);
    renderDrobDown(resultados[1],'cancionArtistaSelect',1,2); 
    renderDrobDown(resultados[2],'cancionAlbumSelect',1,3); 

}


});
