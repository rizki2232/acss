pipeline {
    agent any

    environment {
        CONTAINER_NAME = 'acss'
        PORT = '80'
    }

    options {
        skipDefaultCheckout(true)
    }

    stages {
        // stage('Checkout') {
        //     steps {
        //         checkout scm
        //     }
        // }
        stage('Clone Source') {
            steps {
                deleteDir()
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
                sh 'composer install'
                sh 'npm install'
                sh 'php artisan key:generate'
                sh 'php artisan migrate:fresh --seed'
                sh 'npm run build'
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
