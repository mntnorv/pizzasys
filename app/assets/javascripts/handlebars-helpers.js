Handlebars.registerHelper('formatCurrency', function(value) {
	return sprintf('%.2f', Number(value));
});