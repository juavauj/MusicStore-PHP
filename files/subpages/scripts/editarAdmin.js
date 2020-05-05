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
            accion:'consultarRolesAJAX',
            genero:generoConsulta
    
        };
        let generoString=JSON.stringify(genero);
        xhr.open('POST','../../control/rolesControl.php');
        xhr.setRequestHeader("Content-Type","application/json");
        xhr.onreadystatechange= function(){
            if (this.status==200 && this.readyState==4) {
                let res=JSON.parse(this.responseText); 
                console.log('respuesta',res);           
                
                renderDrobDown(res,'rolSelect',2);
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
            let rolAdmin='';
            const selectRol=document.getElementById(`${id}`);
            if(modo===2){
                rolAdmin=selectRol.value;
            }
            selectRol.innerHTML='';
            if(params[0].idRol!=null){
                params.forEach(param => {
                    if(modo===2 && param.idRol===rolAdmin){
                        option=`<option value="${param.idRol}" selected>${param.rol}</option>`;
                    }else{
                        option=`<option value="${param.idRol}">${param.rol}</option>`;
                    }
                   
                    selectRol.innerHTML+=option;
    
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
    
    
        document.getElementById('pass-status').addEventListener('click',()=>{
            
                let passwordInput = document.getElementById('passwordIn');
                let passStatus = document.getElementById('pass-status');
               
                if (passwordInput.type == 'password'){
                    passwordInput.type='text';
                    passStatus.className='fa fa-eye-slash';
                    
                  }
                  else{
                    passwordInput.type='password';
                    passStatus.className='fa fa-eye';
                  }




        })










});