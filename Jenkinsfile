pipeline {
    agent any

    environment {
        CONTAINER_NAME = 'acs'
        PORT = '8000'
    }

    stages {
        stage('Clone Source') {
            steps {
                echo 'Cloning repository...'
                git branch: 'main', url: 'https://github.com/rizki2232/acss.git'
            }
        }

        stage('Clean Up') {
            steps {
                sh '''
                docker compose down || true
                docker rm -f $(docker ps -aq) || true
                '''
            }
        }

        stage('Build & Run') {
            steps {
                sh './vendor/bin/sail up'
            }
        }
        // stage('Build & Run') {
        //     steps {
        //         sh 'docker compose up -d --build'
        //     }
        // }

        // stage('Wait for MySQL') {
        //     steps {
        //         sh '''
        //         echo "Waiting for MySQL to be ready..."
        //         until docker exec laravel-mysql mysql -u root -p root -e "SELECT 1"; do
        //           echo "Waiting..."
        //           sleep 3
        //         done
        //         '''
        //     }
        // }

        // stage('Laravel Setup') {
        //     steps {
        //         sh '''
        //         docker exec laravel-app cp .env.example .env
        //         docker exec laravel-app php artisan key:generate
        //         docker exec laravel-app php artisan migrate:fresh --seed --force
        //         '''
        //     }
        // }

        // stage('Build Docker Image') {
        //     steps {
        //         echo 'Building Docker image...'
        //         script {
        //             try {
        //                 sh "docker build -t $APP_NAME ."
        //             } catch (e) {
        //                 error "Docker build failed: ${e.message}"
        //             }
        //         }
        //     }
        // }

        // stage('Stop Old Container') {
        //     steps {
        //         echo 'Stopping and removing old container (if exists)...'
        //         script {
        //             sh "docker ps -q --filter name=$CONTAINER_NAME | grep -q . && docker rm -f $CONTAINER_NAME || echo 'No existing container to stop.'"
        //         }
        //     }
        // }

        // stage('Run New Container') {
        //     steps {
        //         echo 'Running new container...'
        //         sh "docker run -d -p $PORT:8000 --name $CONTAINER_NAME $APP_NAME"
        //     }
        // }

        // stage('Laravel setup') {
        //     steps {
        //         sh "docker exec $CONTAINER_NAME cp .env.example .env"
        //         sh "docker exec $CONTAINER_NAME php artisan key:generate"
        //         sh "docker exec $CONTAINER_NAME php artisan storage:link"
        //         sh "docker exec $CONTAINER_NAME php artisan migrate:fresh --seed"
        //     }
        // }
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
