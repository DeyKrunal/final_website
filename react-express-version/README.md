# Project Pilot - React Express Version

This is a rebuilt version of the Project Pilot application using the MERN stack (React, Node.js, Express). The original application was built using PHP.

## Project Structure

The project is divided into two main parts: the frontend and the backend.

```
/react-express-version
  /frontend
    /components
    /pages
    /context
    /docs
  /backend
    /controllers
    /routes
    /models
    /docs
```

## Backend Setup

The backend is a Node.js Express application.

### Dependencies

The following dependencies are required for the backend:

*   `express`: Web framework for Node.js
*   `mysql`: MySQL driver for Node.js
*   `jsonwebtoken`: For generating JSON web tokens for authentication
*   `bcryptjs`: For hashing passwords
*   `cors`: For enabling Cross-Origin Resource Sharing
*   `multer`: For handling file uploads
*   `pdfkit`: For generating PDFs

### Installation

1.  Navigate to the `backend` directory: `cd react-express-version/backend`
2.  Install the dependencies: `npm install`

**Note:** I have encountered a persistent `uv_cwd` error while trying to install the dependencies. This error seems to be related to the environment setup and prevents `npm` from working correctly. If you encounter this error, you may need to troubleshoot your Node.js and npm installation.

### Database Setup

1.  Make sure you have a MySQL server running.
2.  Create a new database named `id21878481_projectpilot`.
3.  Import the database schema. The schema can be inferred from the controller files in the `controllers` directory. You will need to create the following tables:
    *   `faculty_tbl`
    *   `group_stud_tbl`
    *   `progress_tbl`
    *   `schedule_tbl`
    *   `attendance_tbl`
    *   `files_tbl`
    *   `notification_tbl`
    *   `faq_tbl`
4.  Update the database connection details in `config/db.js`.

### Running the Backend

Once the dependencies are installed and the database is set up, you can start the backend server by running the following command in the `backend` directory:

```
npm start
```

## Frontend Setup

The frontend is a React application.

### Dependencies

The following dependencies are required for the frontend:

*   `react`
*   `react-dom`
*   `react-scripts`
*   `tailwindcss`
*   `@mui/material`
*   `@emotion/react`
*   `@emotion/styled`

### Installation

1.  Navigate to the `frontend` directory: `cd react-express-version/frontend`
2.  Install the dependencies: `npm install`

**Note:** I have encountered the same `uv_cwd` error while trying to set up the frontend. You may need to troubleshoot your Node.js and npm installation to resolve this issue.

### Running the Frontend

Once the dependencies are installed, you can start the frontend development server by running the following command in the `frontend` directory:

```
npm start
```

## Completing the Migration

The backend migration is complete, but the frontend has not been implemented due to the environment issues. To complete the migration, you will need to:

1.  Resolve the `uv_cwd` error and set up the frontend and backend environments correctly.
2.  Implement the React components and pages for all the features that have been migrated to the backend.
3.  Connect the React frontend to the Node.js backend API.
4.  Test the application thoroughly.
5.  Build the application for production.
