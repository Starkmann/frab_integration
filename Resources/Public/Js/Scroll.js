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
});
