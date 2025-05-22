pipeline {
    agent any

    environment {
        COMPOSE_PROJECT_NAME = 'acs' // agar container seperti acss_app_1 dan acss_mysql_1
        PORT = '8000'
    }

    stages {
        stage('Clone Source') {
            steps {
                echo 'Cloning repository...'
                git branch: 'main', url: 'https://github.com/rizki2232/acss.git'
            }
        }

        stage('Build Docker Image') {
            steps {
                echo 'Building Docker image with Compose...'
                sh 'docker compose build'
            }
        }

        stage('Up Containers') {
            steps {
                echo 'Starting containers...'
                sh 'docker compose up -d'
            }
        }

        stage('Migrate Database') {
            steps {
                echo 'Migrating and seeding database...'
                sh 'docker compose exec app php artisan migrate:fresh --seed'
            }
        }
    }

    post {
        success {
            echo "✅ Deployment successful. Visit: http://<ip-server>:$PORT"
        }
        failure {
            echo "❌ Deployment failed! Check logs for details."
            sh 'docker compose logs'
        }
    }
}
