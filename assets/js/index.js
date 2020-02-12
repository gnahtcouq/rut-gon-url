(() => {
	$.get("https://api.github.com/repos/gnahtcouq/gnahtcouq.github.io/contents/projects").done(projects => {
		projects.forEach(project => {
			$.get(project.download_url).done(project_data => {
				var project_data = JSON.parse(project_data);
				console.log(project_data);
			});
		});
	});
})();
