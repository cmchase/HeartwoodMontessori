var path = require('path'),
	webpack = require('webpack'),
	paths = {
	theme: './wordpress/wp-content/themes/hwspring2016/'
}

module.exports = {
	entry: [
		paths.theme + 'js/app.js'
	],
	module: {
		loaders: [
			{
				test: /\.less$/,
				include: paths.theme + 'styles/src/',
				loader: 'less-loader'
			},
			{ 
				test: /\.js$/, 
				include: paths.theme + 'js', 
				loader: "babel-loader"}
		]
	},
	output: {
		filename: 'build.js',
		path: paths.theme + 'js/'
	}
}