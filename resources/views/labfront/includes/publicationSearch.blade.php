
<!-- This script for journal paper -->


<script>
	$('ul.nav > li > a[href="' + document.location.pathname + '"]').parent().addClass('active');
</script>


<script>

	$.fn.dataTable.ext.search.push(
			function( settings, data, dataIndex ) {
				var min = parseInt( $('#year_min').val(), 10 );
				var max = parseInt( $('#year_max').val(), 10 );
				var year = parseInt( data[3] ) || 0;

				if ( max < 1000 || min < 1000 ){
					// only do search when numbers are actually years
					return true;
				}

				if ( ( isNaN( min ) && isNaN( max ) ) ||
						( isNaN( min ) && year <= max ) ||
						( min <= year   && isNaN( max ) ) ||
						( min <= year   && year <= max ) )
				{
					return true;
				}
				return false;
			}
	);

	var titlesearch = '';
	var authorsearch = '';


	$('document').ready(function() {
		var table = $('#pubsTable').dataTable({
			"columnDefs": [
				{"targets": [0],
					"orderable": false},
				{"targets": [1,2,3],
					"visible": false}
			],
			"order": [
				[ 2, "desc" ],
				[ 3, "asc" ]
			],
			"dom":'<"wrapper"t>',
			"bPaginate":false
		});

		$("#papertab").click(function() {
			$("#searcharea").fadeIn();
		});
		$("#booktab").click(function() {
			$("#searcharea").fadeOut();
		});


		$("#titlebox").keyup(function() {
			titlesearch = this.value;
			table.fnFilter(this.value, 1);

		});

		$("#authorbox").keyup(function() {
			authorsearch = this.value;
			table.fnFilter(this.value, 2);

		});



		$("#pubsTable").on('draw.dt', function () {
			var body = $("#pubsTable");
			body.unhighlight();
			var words = titlesearch.split(" ").concat(authorsearch.split(" "));
			for (var w in words) {
				if (words[w].length) {
					body.highlight( words[w] );
				}
			}
		} );

		$('#year_min, #year_max').keyup(function() {
			table.fnDraw();
		});

		//$('#papers').fadeIn('slow'); // causes double flash with 'fade' class on tab switch
		$('#papers').show();
	});

</script>


<!-- This script for Conferrence paper -->
<script>

	$.fn.dataTable.ext.search.push(
			function( settings, data, dataIndex ) {
				var min = parseInt( $('#year_min').val(), 10 );
				var max = parseInt( $('#year_max').val(), 10 );
				var year = parseInt( data[3] ) || 0;

				if ( max < 1000 || min < 1000 ){
					// only do search when numbers are actually years
					return true;
				}

				if ( ( isNaN( min ) && isNaN( max ) ) ||
						( isNaN( min ) && year <= max ) ||
						( min <= year   && isNaN( max ) ) ||
						( min <= year   && year <= max ) )
				{
					return true;
				}
				return false;
			}
	);

	var titlesearch1 = '';
	var authorsearch1 = '';


	$('document').ready(function() {
		var table = $('#pubsTable1').dataTable({
			"columnDefs": [
				{"targets": [0],
					"orderable": false},
				{"targets": [1,2,3],
					"visible": false}
			],
			"order": [
				[ 2, "desc" ],
				[ 3, "asc" ]
			],
			"dom":'<"wrapper"t>',
			"bPaginate":false
		});

		$("#papertab").click(function() {
			$("#searcharea").fadeIn();
		});
		$("#booktab").click(function() {
			$("#searcharea").fadeOut();
		});


		$("#titlebox").keyup(function() {
			titlesearch1 = this.value;
			table.fnFilter(this.value, 1);

		});

		$("#authorbox").keyup(function() {
			authorsearch1 = this.value;
			table.fnFilter(this.value, 2);

		});



		$("#pubsTable1").on('draw.dt', function () {
			var body = $("#pubsTable1");
			body.unhighlight();
			var words = titlesearch1.split(" ").concat(authorsearch1.split(" "));
			for (var w in words) {
				if (words[w].length) {
					body.highlight( words[w] );
				}
			}
		} );

		$('#year_min, #year_max').keyup(function() {
			table.fnDraw();
		});

		//$('#papers').fadeIn('slow'); // causes double flash with 'fade' class on tab switch
		$('#papers').show();
	});

</script>



<!-- This script for Books Section -->
<script>

	$.fn.dataTable.ext.search.push(
			function( settings, data, dataIndex ) {
				var min = parseInt( $('#year_min').val(), 10 );
				var max = parseInt( $('#year_max').val(), 10 );
				var year = parseInt( data[3] ) || 0;

				if ( max < 1000 || min < 1000 ){
					// only do search when numbers are actually years
					return true;
				}

				if ( ( isNaN( min ) && isNaN( max ) ) ||
						( isNaN( min ) && year <= max ) ||
						( min <= year   && isNaN( max ) ) ||
						( min <= year   && year <= max ) )
				{
					return true;
				}
				return false;
			}
	);

	var titlesearch1 = '';
	var authorsearch1 = '';


	$('document').ready(function() {
		var table = $('#pubsTable2').dataTable({
			"columnDefs": [
				{"targets": [0],
					"orderable": false},
				{"targets": [1,2,3],
					"visible": false}
			],
			"order": [
				[ 2, "desc" ],
				[ 3, "asc" ]
			],
			"dom":'<"wrapper"t>',
			"bPaginate":false
		});

		$("#papertab").click(function() {
			$("#searcharea").fadeIn();
		});
		$("#booktab").click(function() {
			$("#searcharea").fadeOut();
		});


		$("#titlebox").keyup(function() {
			titlesearch1 = this.value;
			table.fnFilter(this.value, 1);

		});

		$("#authorbox").keyup(function() {
			authorsearch1 = this.value;
			table.fnFilter(this.value, 2);

		});



		$("#pubsTable2").on('draw.dt', function () {
			var body = $("#pubsTable2");
			body.unhighlight();
			var words = titlesearch1.split(" ").concat(authorsearch1.split(" "));
			for (var w in words) {
				if (words[w].length) {
					body.highlight( words[w] );
				}
			}
		} );

		$('#year_min, #year_max').keyup(function() {
			table.fnDraw();
		});

		//$('#papers').fadeIn('slow'); // causes double flash with 'fade' class on tab switch
		$('#papers').show();
	});

</script>