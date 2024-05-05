## API Routes Documentation

### Authentication

**POST /login**

- **Description:** Endpoint for user authentication.
- **Method:** POST
- **Parameters:**
  - email: admin@admin.com
    password: password
- **Response:**
  - Success: 200 OK
  - Failure: 401 Unauthorized

### Companies

**GET /api/companies**

- **Description:** Retrieve a list of all companies.
- **Method:** GET
- **Parameters:**
  - None
- **Authentication Required:** Yes
- **Response:**
  - Success: 200 OK
  - Failure: 401 Unauthorized

### Employees

**GET /api/company/{id}/employees**

- **Description:** Retrieve a list of employees belonging to a specific company.
- **Method:** GET
- **Parameters:**
  - {id}: ID of the company
- **Authentication Required:** Yes
- **Response:**
  - Success: 200 OK
  - Failure: 401 Unauthorized
