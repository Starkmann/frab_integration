$(document).ready(function () {
	$('#example').DataTable({
		scrollY:        "600px",
		scrollX:        true,
		scrollCollapse: true,
		paging:         false,
		fixedColumns: {
			left: 1,
			right: 0
		}
	});
});
