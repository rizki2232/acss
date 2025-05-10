pipeline {
    agent any

    environment {
        COMPOSER_HOME = '$HOME/.composer'
    }

    stages {
        stage('Install Dependencies') {
        agent {
                docker {
                    image 'php:8.1-fpm-alpine'
                    args '-v /var/run/docker.sock:/var/run/docker.sock'
                }
            }
            steps {
                sh 'apk add --no-cache libpng-dev libjpeg-turbo-dev freetype-dev'
                sh 'docker-php-ext-install gd pdo pdo_mysql'
                sh 'composer install --prefer-dist --no-interaction'
            }
        }

        stage('Run Tests') {
            agent {
                docker {
                    image 'php:8.1-fpm-alpine'
                    reuseNode true
                }
            }
            steps {
                sh 'vendor/bin/phpunit --config phpunit.xml'
            }
        }

        stage('Build Assets') {
            agent any  // Langsung gunakan host (tanpa Docker)
            steps {
                sh 'npm install && npm run dev'  // Pastikan Node.js terinstal di host
            }
        }

        stage('Deploy') {
            steps {
                sshagent(['deploy-key']) {
                    sh 'rsync -avz ./ user@production-server:/var/www/app'
                }
            }
        }
    }
}
