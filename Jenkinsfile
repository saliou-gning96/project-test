pipeline {
  agent any
  stages {
    stage('Build') {
      agent any
      steps {
        sh 'docker-compose up -d'
        sh 'docker exec www_docker_symfony composer install'
      }
    }    
    stage('PHP CS Fixer') {
      steps {
        sh 'php-cs-fixer fix --dry-run --no-interaction --diff -vvv src/'
      }
    }
    stage('Test') {
      steps {
        sh 'docker exec app_name php ./bin/phpunit '
      }
    }
  }  
}
