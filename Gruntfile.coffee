module.exports = (grunt) ->
  @initConfig
    pkg: @file.readJSON('package.json')
    watch:
      files: [
        'src/**/*.scss'
      ]
      tasks: ['develop']
    compass:
      dist:
        options:
          config: 'config.rb'
          specify: ['src/**/*.scss']
    csslint:
      options:
        'star-property-hack': false
        'duplicate-properties': false
        'unique-headings': false
      # 'ids': false
        'display-property-grouping': false
        'floats': false
        'outline-none': false
        'box-model': false
        'adjoining-classes': false
        'box-sizing': false
        'universal-selector': false
        'font-sizes': false
        'overqualified-elements': false
        force: true
      src: ['css/*.css']


  # @loadNpmTasks 'grunt-contrib-coffee'
  # @loadNpmTasks 'grunt-contrib-uglify'
  @loadNpmTasks 'grunt-contrib-compass'
  # @loadNpmTasks 'grunt-contrib-jshint'
  @loadNpmTasks 'grunt-contrib-csslint'
  # @loadNpmTasks 'grunt-contrib-concat'
  @loadNpmTasks 'grunt-contrib-watch'

  @registerTask 'default', ['compass']
  @registerTask 'develop', ['compass']
  @registerTask 'package', ['default', 'cssmin', 'csslint']

  @event.on 'watch', (action, filepath) =>
    @log.writeln('#{filepath} has #{action}')