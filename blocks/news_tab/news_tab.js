document.addEventListener('DOMContentLoaded', function() {
	const tabs = document.querySelectorAll('li.news_tab-item');
	const panes = document.querySelectorAll('.news_tab-pane');
	tabs.forEach(tab => {
		tab.addEventListener('click', function(event) {
			event.preventDefault();
			tabs.forEach(item => item.classList.remove('active'));
			panes.forEach(pane => pane.style.display = 'none');
			tab.classList.add('active');
			const categoryId = tab.getAttribute('data-category');
			document.getElementById('category-' + categoryId).style.display = 'block';
		});
	});
	if (tabs.length > 0) {
		tabs[0].classList.add('active');
		panes[0].style.display = 'block';
	}
});