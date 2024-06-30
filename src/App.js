import logo from './logo.svg';
import './App.css';
import ListArticle from './components/listArticle';
import AddArticle from './components/AddArticle';

function App() {
  return (
    <div className="App">
       <h1>Crud API ODC Test</h1>
          <ListArticle />
          <AddArticle/>
    </div>
          
  );
}

export default App;
