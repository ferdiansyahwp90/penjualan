/// <reference types="cypress" />
describe("User Login", () => {
    it('Page dashboard', () => {
      cy.visit('http://127.0.0.1:8000');
      Cypress.on('uncaught:exception', (err, runnable) => {
        return false;
      });
      cy.get('.navbar-brand');
      cy.get(':nth-child(1) > .nav-link');
      cy.get(':nth-child(2) > .nav-link');
      cy.get('button.btn');
      cy.get('a.btn');
      cy.get('header.bg-dark');
      cy.get('.page-wrapper > .py-5');
    });
    it('Sign In',() =>{
      cy.visit('http://127.0.0.1:8000')
      cy.get('a.btn');
      cy.get('#form3Example1');
      cy.get('#form3Example4');
      cy.get('.btn');
  
      cy.get('#form3Example1 > .form-control').type("admin1");
      cy.get('form3Example4 > .form-control').type("admin");
      cy.get('.btn');
    });
  
    // it("Cannot Sign In", () => {
    //   cy.visit("http://localhost:8000/");
    //   Cypress.on('uncaught:exception', (err, runnable) => {
    //     return false;
    //   });
    //   cy.get('h4');
    //   cy.get(':nth-child(2) > .input-group-text > .fa');
    //   cy.get(':nth-child(3) > .input-group-text > .fa');
    //   cy.get('.form-check-label');
    //   cy.get('.col-6 > .btn');
      
    //   cy.get(':nth-child(2) > .form-control').type("random@example.org");
    //   cy.get(':nth-child(3) > .form-control').type("random");
    //   cy.get(".col-6> .btn").click();
    //   cy.get(".invalid-feedback").contains(
    //     "These credentials do not match our records."
    //   );
    // });
  })