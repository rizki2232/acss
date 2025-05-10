pipeline {
    agent any

    environment {
        APP_ENV = 'local'
    }

    stages {
        stage('Clone Repo') {
            steps {
                git 'https://github.com/rizki2232/acss.git'
            }
        }

        stage('Install Composer') {
            steps {
                sh 'composer install'
            }
        }

        stage('Setup .env & Key') {
            steps {
                sh 'cp .env.example .env'
                sh 'php artisan key:generate'
            }
        }

        stage('Test') {
            steps {
                sh 'php artisan test'
            }
        }
    }
}
