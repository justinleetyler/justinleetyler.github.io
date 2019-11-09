$(document).ready(function(){

	//GLOBAL VAR
	var XMLSource = $('#data').attr('xmlData');
	var keyword = '';
	var catType = '';
	var pub = '';
						   
	var i = 0;
   
	$("#searchButton").click(function() {
		keyword = $("input#term").val();
		catType = $("#category option:selected").val();
		
		//Reset any message
		var errMsg = '';
		pub = '';
	
		if ( keyword == '' ) { errMsg += 'Please enter a search term' + '\n'; }
		else if ( catType == 'none' ) { errMsg += 'Please select a category' + '\n'; }
		else { searchThis(); }

		if ( errMsg != '' ) {
			pub += '<div class="error">' + '\n';
			pub += errMsg;
			pub += '</div>' + '\n';
		}
		
		//Show error
		$('#result').html( pub );

	});
	
	function searchThis() {				
		$.ajax({
			type: "GET",
			url: XMLSource,
			dataType: "xml",
			success: function(xml) { loadPublication (xml) }	
		});
	}
	
	function loadPublication (xmlData) {
		i = 0;
		var row;
		
		var searchExp = "";
		
		$(xmlData).find('record').each(function(){
			
			var title = $(this).find('title').text();
			var creator = $(this).find('creator').text();
			var subject = $(this).find('subject').text();
			var bibliographicCitation = $(this).find('bibliographicCitation').text();
			
			//Format the keyword expression
			var exp = new RegExp(keyword,"gi");
			
			//Check if there is a category selected; 
			//if not, use height column as a default search
			if ( catType == 'title' ) { searchExp = title.match(exp); }
			else if ( catType == 'creator' ) { searchExp = creator.match(exp); }
			else if ( catType == 'subject' ) { searchExp = subject.match(exp); }
			else if ( catType == 'bibliographicCitation' ) { searchExp = bibliographicCitation.match(exp); }
			
			if ( searchExp != null ) {
				
				//Start building the result
				if ((i % 2) == 0) { row = 'even'; }
				else { row = 'odd'; }
				
				i++;				
				
				pub += '<tr class="row ' + row + '">' + '\n';
				pub += '<td valign="top" class="col1">' + title + '</td>' + '\n';	
				pub += '<td valign="top" class="col2">' + creator + '</td>' + '\n';	
				pub += '<td valign="top" class="col3">' + subject + '</td>' + '\n';
				pub += '<td valign="top" class="col4">' + bibliographicCitation + '</td>' + '\n';
				pub += '</tr>' + '\n';
			}	
		});
				
		if ( i == 0 ) {
			pub += '<div class="error">' + '\n';
			pub += 'No Result was Found' + '\n';	
			pub += '</div>' + '\n';
			
			//Populate the result
			$('#result').html( pub );
		}
		else {
			//Pass the result set
			showResult ( pub );
		}
	}
	
	function showResult (resultSet) {

		//Show the result
		pub = '<div class="message">There are ' + i + ' results!</div>';
		pub += '<table id="grid" border="0">' + '\n';
		pub += '<thead><tr>' + '\n';
		pub += '<td class="col1">Title</th>' + '\n';
		pub += '<td class="col2">Creator</th>' + '\n';
		pub += '<td class="col3">Subject</th>' + '\n';
		// pub += '<td class="col4">bibliographicCitation</th>' + '\n';
		pub += '</tr></thead>' + '\n';
		pub += '<tbody>' + '\n';
		
		pub += resultSet;
		
		pub += '</tbody>' + '\n';
		pub += '</table>' + '\n';
		
		//Populate 
		$('#result').html(pub)
		
		$('#grid').tablesorter(); 
	}
});
