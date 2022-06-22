$(document).ready(function () {
	$('#example').DataTable({
		scrollY:        "600px",
		scrollX:        true,
		scrollCollapse: true,
		paging:         false,
		ordering: false,
		rowsGroup: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25],
		fixedColumns: {
			left: 1,
			right: 0
		}
	});
	document.querySelectorAll('.frab-scheduler').forEach(function(scheduler) {
		var HORIZONTAL_SCROLL_THRESHOLD = 100;
		var buttons = scheduler.querySelectorAll('.sticky-controls button');
		var scrollBody = scheduler.querySelector('.dataTables_scrollBody');
		buttons.forEach(function(button) {
			button.addEventListener('click', function() {
				scrollBody.scrollLeft += button.classList.contains('left') ? - HORIZONTAL_SCROLL_THRESHOLD : HORIZONTAL_SCROLL_THRESHOLD;
			})
		});
	});
});


