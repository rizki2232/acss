pipeline {
    agent any

    environment {
        CONTAINER_NAME = 'acss'
        PORT = '80'
    }

    stages {
        stage('Clone Source') {
            steps {
                sh 'sudo chown -R jenkins:jenkins /var/lib/jenkins/workspace/acss'
                echo 'Cloning repository...'
                git branch: 'main', url: 'https://github.com/rizki2232/acss.git'
            }
        }
        stage('Copy .env') {
            steps {
                echo 'Copy environment file...'
                sh 'cp .env.example .env'
            }
        }
        stage('Docker Compose Down') {
            steps {
                echo 'Stopping and removing existing containers...'
                sh 'docker compose down'
            }
        }
        stage('Docker Compose Build') {
            steps {
                echo 'Building Docker images...'
                sh 'docker compose up -d --build'
            }
        }
        stage('Laravel setup') {
            steps {
                echo 'Running Laravel setup...'
                sh 'docker-compose exec -T php composer install'
                sh 'docker-compose exec -T php npm install'
                sh 'docker-compose exec -T php php artisan key:generate'
                sh 'docker-compose exec -T php php artisan migrate:fresh --seed'
                sh 'docker-compose exec -T php npm run build'
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
