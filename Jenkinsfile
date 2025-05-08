pipeline {
    agent any

    environment {
        // Menetapkan variabel lingkungan untuk PHP dan Composer
        COMPOSER_HOME = '$HOME/.composer'
    }

    stages {
        stage('Install Dependencies') {
            agent {
                docker {
                    image 'php:8.1-fpm-alpine'
                    reuseNode true
                }
            }
            steps {
                script {
                    // Install PHP extension untuk Composer dan dependensi lainnya
                    sh '''
                        apk add --no-cache --virtual .build-deps \
                            libpng-dev libjpeg-turbo-dev libfreetype6-dev \
                            && docker-php-ext-configure gd --with-freetype --with-jpeg \
                            && docker-php-ext-install gd \
                            && apk del .build-deps
                    '''
                    // Menjalankan Composer untuk install dependensi Laravel
                    sh 'composer install --prefer-dist --no-interaction'
                }
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
                // Menjalankan unit tests menggunakan PHPUnit
                sh 'vendor/bin/phpunit --config phpunit.xml'
            }
        }

        stage('Build Assets') {
            agent {
                docker {
                    image 'node:18-alpine'
                    reuseNode true
                }
            }
            steps {
                // Menjalankan build frontend jika menggunakan Laravel Mix (npm)
                sh '''
                    npm install
                    npm run dev
                '''
            }
        }

        stage('Deploy') {
            steps {
                // Menjalankan perintah deploy, seperti upload ke server atau cloud
                echo 'Deploy to production'
            }
        }
    }
}
