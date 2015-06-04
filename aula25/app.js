Ext.onReady(function() {
	Ext.create('Ext.Button',{
		text: 'Alerta',
		renderTo: 'btnAlert',
		handler: function(){
			Ext.MessageBox.alert('Alerta', 'Simples Alerta!!!', function(btn){
				console.log('Apertou o botão: ' + btn);
			});
		}
	});	
	
	Ext.create('Ext.Button',{
		text: 'Confirmação',
		renderTo: 'btnConfirm',
		handler: function(){
			Ext.MessageBox.confirm('Confirma', 'Dejesa realmente deletar o arqivo?', function(btn){
				console.log('Apertou o botão: ' + btn);
				if(btn == 'yes'){
					Ext.MessageBox.alert('Mensagem', 'Arquivo deletado com sucesso!!!');
				}
				else if(btn == 'no'){
					console.log('Cancelado, Arquivo mantido!!');
				}
			});
		}
	});	
	
	Ext.create('Ext.Button',{
		text: 'Prompt',
		renderTo: 'btnPrompt',
		handler: function(){
			Ext.MessageBox.prompt('Prompt', 'Qual é o seu nome?', function(btn, text){
				console.log('Apertou o botão: ' + btn);
				console.log('Entrou com o texto: ' + text);
				if(btn == 'ok'){
					Ext.MessageBox.alert('Bem vindo!', 'Bem vindo ' + text + "!");
				}
				else if(btn == 'cancel'){
					console.log('Cancelou!!');
				}
			});
		}
	});	
	
	Ext.create('Ext.Button',{
		text: 'Prompt Multline',
		renderTo: 'btnPromptMult',
		handler: function(){
			Ext.MessageBox.prompt('Prompt', 'O que você gosta de fazer?', function(btn, text){
				console.log('Apertou o botão: ' + btn);
				console.log('Entrou com o texto: ' + text);
				if(btn == 'ok'){
					Ext.MessageBox.alert('Mensagem!!', text);
				}
				else if(btn == 'cancel'){
					console.log('Cancelou!!');
				}
			},this, true,'descreva aqui o que vc gosta de fazer...');
		}
	});	
	
	Ext.create('Ext.Button',{
		text: 'Icone - ERROR',
		renderTo: 'btnError',
		handler: function(){
			Ext.MessageBox.show({
				title: 'Erro!',
				msg: 'Alguma coisa deu errado',
				icon: Ext.MessageBox.ERROR
			});
		}
	});	
	
	Ext.create('Ext.Button',{
		text: 'Icone - INFO',
		renderTo: 'btnInfo',
		handler: function(){
			Ext.MessageBox.show({
				title: 'Info!',
				msg: 'Registro deletado com sucesso!',
				icon: Ext.MessageBox.INFO
			});
		}
	});
	
	Ext.create('Ext.Button',{
		text: 'Icone - QUESTION',
		renderTo: 'btnQuestion',
		handler: function(){
			Ext.MessageBox.show({
				title: 'Info!',
				msg: 'Você tem certeza que quer fazer isso?',
				icon: Ext.MessageBox.QUESTION
			});
		}
	});	
	
	Ext.create('Ext.Button',{
		text: 'Icone - WARNING',
		renderTo: 'btnWarning',
		handler: function(){
			Ext.MessageBox.show({
				title: 'Warning!',
				msg: 'Opa você não selecionou pelo menus uma das opções',
				icon: Ext.MessageBox.WARNING
			});
		}
	});	
	
	Ext.create('Ext.Button',{
		text: 'Icone - CANCEL',
		renderTo: 'btnCancel',
		handler: function(){
			Ext.MessageBox.show({
				title: 'Botão - CANCEL!',
				msg: 'Por favor, cancele a operação.',
				icon: Ext.MessageBox.WARNING,
				buttons: Ext.MessageBox.CANCEL,
				fn: function(btn){
					console.log('apertou o botão ' + btn);
				}
			});
		}
	});	
	
	Ext.create('Ext.Button',{
		text: 'Icone - NO',
		renderTo: 'btnNo',
		handler: function(){
			Ext.MessageBox.show({
				title: 'Botão - NO!',
				msg: 'Você gosta de jiló?',				
				buttons: Ext.MessageBox.NO,
				fn: function(btn){
					console.log('apertou o botão ' + btn);
				}
			});
		}
	});	
	
	Ext.create('Ext.Button',{
		text: 'Icone - OK',
		renderTo: 'btnOk',
		handler: function(){
			Ext.MessageBox.show({
				title: 'Botão - NO!',
				msg: 'Eu gosto de EXTJS',				
				buttons: Ext.MessageBox.OK,
				fn: function(btn){
					console.log('apertou o botão ' + btn);
				}
			});
		}
	});	
	
	Ext.create('Ext.Button',{
		text: 'Icone - OKCANCEL',
		renderTo: 'btnOKCANCEL',
		handler: function(){
			Ext.MessageBox.show({
				title: 'Botão - OKCANCEL!',
				msg: 'Você quer deletar o registro??',				
				buttons: Ext.MessageBox.OKCANCEL,
				fn: function(btn){
					console.log('apertou o botão ' + btn);
					if(btn == 'ok'){
						Ext.MessageBox.alert('Mensagem', 'Registro deletado com sucesso!');
					}
				}
			});
		}
	});	
	
	Ext.create('Ext.Button',{
		text: 'Icone - YES',
		renderTo: 'btnYes',
		handler: function(){
			Ext.MessageBox.show({
				title: 'Botão - NO!',
				msg: 'Você gosta de EXTJS?',				
				buttons: Ext.MessageBox.YES,
				fn: function(btn){
					console.log('apertou o botão ' + btn);
					
				}
			});
		}
	});	
	
	Ext.create('Ext.Button',{
		text: 'Icone - YESNO',
		renderTo: 'btnYESNO',
		handler: function(){
			Ext.MessageBox.show({
				title: 'Botão - YESNO!',
				msg: 'Vc quer deletar esse registro?',				
				buttons: Ext.MessageBox.YESNO,
				fn: function(btn){
					console.log('apertou o botão ' + btn);
					if(btn == 'yes'){
						Ext.MessageBox.alert('Mensagem', 'Registro deletado com sucesso!');
					}
				}
			});
		}
	});	
	
	Ext.create('Ext.Button',{
		text: 'Icone - YESNOCANCEL',
		renderTo: 'btnYESNOCANCEL',
		handler: function(){
			Ext.MessageBox.show({
				title: 'Botão - YESNOCANCEL!',
				msg: 'Vc quer deletar esse registro?',				
				buttons: Ext.MessageBox.YESNOCANCEL,
				fn: function(btn){
					console.log('apertou o botão ' + btn);
					if(btn == 'yes'){
						Ext.MessageBox.alert('Mensagem', 'Registro deletado com sucesso!');
					}else if (btn == 'no'){
						Ext.MessageBox.alert('Mensagem', 'Ok, não vou deletar o registro!');
					}else if(btn == 'cancel'){
						Ext.MessageBox.alert('Mensagem', 'Operação cancelada  !');
					}
				}
			});
		}
	});	
	
	Ext.create('Ext.Button',{
		text: 'Show - Prompt',
		renderTo: 'btnShowPrompt',
		handler: function(){
			Ext.MessageBox.show({
				title: 'Show - Prompt',
				msg: ' Você gosta de Extjs por qual motivo?',
				prompt: true,
				windth: 400,
				buttons: Ext.MessageBox.OK,
				fn: function(btn, text){
					console.log('Apertou o botão: ' + btn);
					console.log('Entrou com o texto: ' + text);
				}
			});
		}
	});	
	
	Ext.create('Ext.Button',{
		text: 'Show - Prompt Multline',
		renderTo: 'btnShowPromptMult',
		handler: function(){
			Ext.MessageBox.show({
				title: 'Show - Prompt',
				msg: ' Você gosta de Extjs por qual motivo?',
				multiline: true,
				windth: 400,
				modal: false,
				buttons: Ext.MessageBox.OK,
				fn: function(btn, text){
					console.log('Apertou o botão: ' + btn);
					console.log('Entrou com o texto: ' + text);
				}
			});
		}
	});	
	
	Ext.create('Ext.Button',{
		text: 'Show - Progresso',
		renderTo: 'btnProgresso',
		handler: function(){
			Ext.MessageBox.show({
				title: 'Show - Progresso',
				msg: 'Carregando os dados...',
				progressText: 'carregando',
				progress: true,
				closable: false,
				windth: 300
			});
			var f = function(v){
				return function (){
					if(v==12){
						Ext.MessageBox.hide();
						Ext.MessageBox.alert('Pronto!', 'Os dados foram carregados!');
						
					}else{
						var i = v/11;
						Ext.MessageBox.updateProgress(i,Math.round(100*1)+'%');
					}
				};
			}
			for (var i=1; i<13; i++){
				setTimeout(f(i),i*500); 
			}
		}
	});	
	
	Ext.create('Ext.Button',{
		text: 'Show - Wait',
		renderTo: 'btnWait',
		handler: function(){
			Ext.MessageBox.show({
				title: 'Espere',
				msg: 'Salvando os dados...',
				wait: true,
				waitConfog: {interval: 200},
				closable: false,
				windth: 300
			});
			setTimeout(function(){
				Ext.MessageBox.hide();
				Ext.MessageBox.alert('Pronto!', 'Os dados foram salvos com sucesso!');
				},8000);
			}
	});	
	
	Ext.create('Ext.Button',{
		text: 'Icone - Customizado',
		renderTo: 'btnYESNOCANCELCustom',
		handler: function(){
			Ext.MessageBox.show({
				title: 'Botão - Customizado!',
				msg: 'Vc quer deletar esse registro?',				
				buttons: Ext.MessageBox.YESNOCANCEL,
				buttonText:{
					yes: 'Sim',
					no: 'Não',
					cancel: 'Cancelar',
				},
				fn: function(btn){
					console.log('apertou o botão ' + btn);
					if(btn == 'yes'){
						Ext.MessageBox.alert('Mensagem', 'Registro deletado com sucesso!');
					}else if (btn == 'no'){
						Ext.MessageBox.alert('Mensagem', 'Ok, não vou deletar o registro!');
					}else if(btn == 'cancel'){
						Ext.MessageBox.alert('Mensagem', 'Operação cancelada  !');
					}
				}
			});
		}
	});
	
	Ext.create('Ext.Button',{
		text: 'Icone - Customizado',
		renderTo: 'btnCustomIcon',
		handler: function(){
			Ext.MessageBox.show({
				title: 'Mensagem',
				msg: 'Eu gosto de EXTJS',
				icon: 'icon-pinguim',
				
			});
		}
	});	
		
		
});