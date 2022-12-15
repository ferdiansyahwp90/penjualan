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

    it('Page Register', () =>{

    }); 

    it('Sign In',() =>{
      cy.visit('http://127.0.0.1:8000/login')

      cy.get('#form3Example1').type("admin1");
      cy.get('#form3Example4').type("admin1");
      cy.get('.btn').click();

      cy.get('.far');
      cy.get('[data-id="users"] > .sidebar-link > .fa').click();
    });

  })