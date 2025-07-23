# Project Setup Instructions

## Prerequisites
- Docker
- Docker Compose

## Setup
1. Clone the repository.
2. Navigate to the project directory.
3. Create a `.env` file in the `nodejs-version` directory. You can use the `.env.example` file as a template.
4. Run the following command to build and start the Docker container:
   ```bash
   docker-compose up --build
   ```

The application will be available at `http://localhost:3000`.
