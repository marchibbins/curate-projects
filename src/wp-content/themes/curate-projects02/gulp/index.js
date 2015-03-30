var fs = require('fs');
var onlyScripts = require('./util/scriptFilter');
var tasks = fs.readdirSync('./gulp/task/').filter(onlyScripts);

tasks.forEach(function(task) {
  require('./task/' + task);
});
