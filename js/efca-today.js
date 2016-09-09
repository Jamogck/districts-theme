jQuery(document).ready(function($) {
	// var todayIssuesAPI = "http://efcatoday.org/api/issues";
	// $.getJSON( todayIssuesAPI, function(data) {
	// 	console.log(data);
	// });

	var todayIssuesAPI = "http://efcatoday.org/api/issues";
	$.ajax({
		url: todayIssuesAPI,
		crossDomain: true,
		dataType: 'json',
		method: 'GET'
	});
});

// (function() {
//   var flickerAPI = "http://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?";
//   $.getJSON( flickerAPI, {
//     tags: "mount rainier",
//     tagmode: "any",
//     format: "json"
//   })
//     .done(function( data ) {
//       $.each( data.items, function( i, item ) {
//         $( "<img>" ).attr( "src", item.media.m ).appendTo( "#images" );
//         if ( i === 3 ) {
//           return false;
//         }
//       });
//     });
// })();