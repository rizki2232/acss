pipeline {
    agent any

    environment {
        APP_NAME = 'acss'                  // Nama image
        CONTAINER_NAME = 'acss-container'  // Nama container
        PORT = '8000'                      // Port host:container
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
                echo 'Building Docker image...'
                script {
                    try {
                        sh "docker build -t $APP_NAME ."
                    } catch (e) {
                        error "Docker build failed: ${e.message}"
                    }
                }
            }
        }

        stage('Stop Old Container') {
            steps {
                echo 'Stopping and removing old container (if exists)...'
                script {
                    sh "docker ps -q --filter name=$CONTAINER_NAME | grep -q . && docker rm -f $CONTAINER_NAME || echo 'No existing container to stop.'"
                }
            }
        }

        stage('Run New Container') {
            steps {
                echo 'Running new container...'
                sh "docker run -d -p $PORT:8000 --name $CONTAINER_NAME $APP_NAME"
            }
        }
    }

    post {
        success {
            echo "✅ Deployment successful. Visit: http://<ip-server>:$PORT"
        }
        failure {
            echo "❌ Deployment failed! Check logs for details."
        }
    }
}
