<script type="text/javascript">
	// 完了後ポップアップ表示
	const is_after_complete = "{{ Session::get('is_after_complete') }}";
	if (is_after_complete) {
			alert(is_after_complete);
		}

</script>