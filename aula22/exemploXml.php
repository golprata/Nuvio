<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../extjs4/resources/css/ext-all.css">
	<script type="text/javascript" src="../extjs4/ext-all.js"></script>
	<title>Aula 21</title>
</head>
<body>

</body>
<script type="text/javascript">	
	
	Ext.define('Contato',{
		extend: 'Ext.data.Model',
		
		fields: [
		    {name: 'id', type: 'int'},
		    {name: 'name', type: 'string'},
		    {name: 'email', type: 'string'}
		]
// 		idProperty: 'ID' // caso o id na seja id com letra minusculas
	});
	
	Ext.define('ContatosStore',{
		extend: 'Ext.data.Store',
		model: 'Contato',
		proxy: {
			type: 'rest',
			url: 'php/xml/contatos.php', 
			
						
			reader: {
				type: 'xml',  //json ou xml
				root: 'contatos',
				record: 'contato' // apenas no xml			
			},
			
			writer: {
				type: 'xml', //json ou xml
				documentRoot: 'contatos',
				record: 'contato', // apenas no xml		
				writeAllFields: true, // passa todos os campos informados
				encode: true,
				//allowSingle: true  // NAO PRECISA COM XML
			}
		},
		autoLoad: true,
		autoSync: true
	});

	Ext.onReady(function(){		
		
		var store = Ext.create('ContatosStore');
		
		//console.log(store.data);
		
		store.on('load', function(s){
			console.log(s.data);
			
			var contato = Ext.create('Contato',{
				name: 'Maricota',
				email: 'maricota@gmail.com',				
			});
			
			
			//CREATE
// 			s.add(contato); //s.add({nome: 'fab', email: 'email.cpm'});			 
// 			 s.insert(0,contato); // insere contato na primeira posicao da store
			
			//UPDATE
// 			var contatoAtualizado = s.getAt(2); // getById(5); 
// 			contatoAtualizado.set('name', 'sadhgdkjSDGG');
			
			
			//DELETE
// 			s.remove(modelo);
// 			s.removeAt(index);
// 			s.removeAll(silent); //remove tudo // silent == true ou false

// 			s.remove(s.getAt(2));
			

// 			s.sync();
		});
		
	});
</script>
</html>